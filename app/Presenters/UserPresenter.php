<?php namespace app\Presenters;

use Laracasts\Presenter\Presenter;
use Route;
use App\Models\User;
use App\Models\Role;
use Cache;

class UserPresenter extends Presenter
{
    public function gravatar($size = 100)
    {
        if ($this->avatar && strpos($this->avatar, 'http') !== false ) {
            return $this->avatar;
        }
        if (config('app.url_static') && $this->avatar) {
            //Using Qiniu image processing service.
            return cdn('uploads/avatars/'.$this->avatar)."?imageView2/1/w/{$size}/h/{$size}";
        }

        $github_id = $this->github_id;
        $domainNumber = rand(0, 3);

        return "https://avatars{$domainNumber}.githubusercontent.com/u/{$github_id}?v=2&s={$size}";
    }

    public function lastActivedAt()
    {
        $show_key  = config('custom.actived_time_data');
        $show_data = Cache::get($show_key);

        if (!isset($show_data[$this->id])) {
            $show_data[$this->id] = $this->last_actived_at;
            Cache::forever($show_key, $show_data);
        }

        return $show_data[$this->id];
    }
}
