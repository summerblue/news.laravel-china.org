<?php

namespace App\Models;

use Carbon\Carbon;

class SiteStatus extends BaseModel
{
    public static function newUser($driver)
    {
        self::collect('new_user');
        switch ($driver) {
            case 'github':
                self::collect('new_user_from_github');
                break;
            case 'wechat':
                self::collect('new_user_from_wechat');
            case 'wechat':
                self::collect('new_user_from_weibo');
                break;
        }
    }

    public static function collect($subject)
    {
        $today = Carbon::now()->toDateString();

        if (!$todayStatus = SiteStatus::where('day', $today)->first()) {
            $todayStatus = new SiteStatus;
            $todayStatus->day = $today;
        }

        switch ($subject) {
            case 'new_user':
                $todayStatus->register_count += 1;
                break;
            case 'new_user_from_github':
                $todayStatus->github_regitster_count += 1;
                break;
            case 'new_user_from_wechat':
                $todayStatus->wechat_registered_count += 1;
            case 'new_user_from_weibo':
                $todayStatus->wechat_registered_count += 1;
                break;
        }

        $todayStatus->save();
    }
}
