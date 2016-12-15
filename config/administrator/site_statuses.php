<?php
use App\Models\SiteStatus;

return [
    'title'   => '数据统计',
    'heading' => '数据统计',
    'single'  => '数据统计',
    'model'   => SiteStatus::class,

    'permission' => function () {
        return true;
    },

    'action_permissions' => [
        'create' => function ($model) {
            return false;
        },
        'update' => function ($model) {
            return false;
        },
        'delete' => function ($model) {
            return false;
        },
        'view' => function ($model) {
            return true;
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'day' => [
            'title'    => '日期',
            'sortable' => false,
        ],
        'register_count' => [
            'title'    => '注册用户数',
        ],
        'github_regitster_count' => [
            'title'    => 'Github 注册数',
        ],
        'wechat_registered_count' => [
            'title'    => 'WeChat 注册数',
        ],
        'wechat_registered_weibo' => [
            'title'    => '微博注册数',
        ],
        'operation' => [
            'title'    => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'day' => [
            'title' => '日期',
        ],
    ],
    'filters' => [
        'day' => [
            'title' => '日期',
        ],
    ],
];
