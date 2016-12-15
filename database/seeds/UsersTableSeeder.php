<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = factory(User::class)->times(4)->make()->each(function ($user, $i) {
            if ($i == 0) {
                $user->name = 'Summer';
                $user->email = 'summer@estgroupe.com';
                $user->avatar = 'https://dn-phphub.qbox.me/uploads/avatars/1_1479342408.png';
                $user->password = bcrypt('adminadmin');
            }
            if ($i == 1) {
                $user->name = 'Monkey';
                $user->email = 'monkey@estgroupe.com';
                $user->avatar = 'https://dn-phphub.qbox.me/uploads/avatars/3_1475195515.jpg';
                $user->password = bcrypt('adminadmin');
            }
            if ($i == 2) {
                $user->name = 'Jobslong';
                $user->email = 'jobslong@estgroupe.com';
                $user->avatar = 'https://dn-phphub.qbox.me/uploads/avatars/56_1427370654.jpeg';
                $user->password = bcrypt('adminadmin');
            }
            if ($i == 3) {
                $user->name = 'overtrue';
                $user->email = 'anzhengchao@gmail.com';
                $user->avatar = 'https://dn-phphub.qbox.me/uploads/avatars/76_1451276555.png';
                $user->password = bcrypt('adminadmin');
            }
        });

        User::insert($users->toArray());
    }
}
