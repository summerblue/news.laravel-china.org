<?php


use App\Models\Issue;


return [

    'title' => '周刊',
    'heading' => '周刊',
    'single' => '周刊',

    'model' => Issue::class,

    'columns' => [
        'id' => [
            'title' => 'ID'
        ],
        'name' => [
            'title' => '标题',
        ],
        'description' => [
            'title' => '简介',
        ],
        'is_published' => [
            'title' => '已发布',
        ],
        'view_count' => [
            'title' => '查看次数',
        ],
        'created_at',
        'operation' => [
            'title'  => '管理',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => '标题',
        ],
        'description' => [
            'title' => '简介',
        ],
        'is_published' => array(
            'title' => '是否发布',
            'type'     => 'enum',
            'options'  => [
                'yes' => '已发布',
                'no'  => '未发布',
            ],
            'value' => 'no',
        ),
    ],

    'filters' => [
        'name' => [
            'title' => '标题',
        ],
    ],

];
