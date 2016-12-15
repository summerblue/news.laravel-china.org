<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Cache;
use Auth;
use Flash;
use App\Http\Requests\UpdateUserRequest;
use App\Jobs\SendActivateMail;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => [
                'edit', 'update', 'destroy',
                'doFollow', 'editAvatar', 'updateAvatar',
                'editEmailNotify', 'updateEmailNotify', 'emailVerificationRequired'
             ]
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
    }

    public function edit($id)
    {
    }

    public function update($id, UpdateUserRequest $request)
    {
    }

    public function blocking($id)
    {
        $user = User::findOrFail($id);
        $user->is_banned = $user->is_banned == 'yes' ? 'no' : 'yes';
        $user->save();

        return redirect(route('users.show', $id));
    }

    public function editEmailNotify($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        return view('users.edit_email_notify', compact('user'));
    }

    public function updateEmailNotify($id, Request $request)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        $user->email_notify_enabled = $request->email_notify_enabled == 'on' ? 'yes' : 'no';
        $user->save();

        Flash::success('操作成功！');

        return redirect(route('users.edit_email_notify', $id));
    }

    public function doFollow($id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->isFollowing($id)) {
            Auth::user()->unfollow($id);
        } else {
            Auth::user()->follow($id);
            app('Phphub\Notification\Notifier')->newFollowNotify(Auth::user(), $user);
        }

        Flash::success('操作成功');
        return redirect(route('users.show', $id));
    }

    public function editAvatar($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        return view('users.edit_avatar', compact('user'));
    }

    public function updateAvatar($id, Request $request)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        if ($file = $request->file('avatar')) {
            $user->updateAvatar($file);
            Flash::success('头像上传成功');
        } else {
            Flash::error('头像上传失败');
        }

        return redirect(route('users.edit_avatar', $id));
    }

    public function editSocialBinding($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        return view('users.edit_social_binding', compact('user'));
    }

    public function sendVerificationMail()
    {
        $user = Auth::user();
        $cache_key = 'send_activite_mail_' . $user->id;
        if (Cache::has($cache_key)) {
            Flash::error('邮件发送失败，请于 ' . (Cache::get($cache_key) - time()) . ' 秒后重试');
        } else {
            if (!$user->email) {
                Flash::error('邮件发送失败，请先填写您的邮箱');
            } else {
                if (!$user->verified) {
                    dispatch(new SendActivateMail($user));
                    Flash::success('验证邮件发送成功！');
                    Cache::put($cache_key, time() + 60, 1);
                }
            }
        }

        return redirect()->intended('/');
    }

    public function emailVerificationRequired()
    {
        if (\Auth::user()->verified) {
            return redirect()->intended('/');
        }
        return view('users.emailverificationrequired');
    }
}
