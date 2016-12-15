<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'            => 'alpha_num|required|unique:users',
            'github_id'       => 'unique:users',
            'wechat_unionid'  => 'string|unique:users',
            'wechat_openid'   => 'string',
            'weibo_id'        => 'string|unique:users',
            'email'           => 'email|required|unique:users',
            'image_url'       => 'url',
        ];
    }
}
