<?php


use App\Models\Link;


return [

    'title' => '链接',
    'heading' => '链接',
    'single' => '链接',

    'model' => Link::class,

    'columns' => [
        'id' => [
            'title' => 'ID'
        ],
        'title' => [
            'title' => '标题',
        ],
        'link' => [
            'title' => '链接',
        ],
        'description' => [
            'title' => '描述',
            'sortable' => false,
            'output' => function($value)
            {
                return make_excerpt($value);
            },
        ],
        'user_name' => [
            'title' => '作者',
        ],
        'user_link' => [
            'title' => '作者链接',
        ],
        'category_name' => [
            'title' => '分类',
            'relationship' => 'category', //this is the name of the Eloquent relationship method!
            'select' => "(:table).name",
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
        'title' => [
            'title' => '标题',
        ],
        'link' => [
            'title' => '链接',
        ],
        'description' => [
            'title' => '描述',
            'type' => 'textarea'
        ],
        'user_name' => [
            'title' => '作者',
        ],
        'user_link' => [
            'title' => '作者链接',
        ],
        'order' => [
            'title' => '优先级',
            'value' => '0',
        ],
        'category' => array(
            'type' => 'relationship',
            'title' => '分类',
            'name_field' => 'name',
        ),
        'issue' => array(
            'type' => 'relationship',
            'title' => '周刊',
            'name_field' => 'name',
            'value' => '0',
        ),
        'created_at' => [
            'title' => '发布时间',
            'type' => 'datetime',
        ],
    ],

    'filters' => [
        'title' => [
            'title' => '标题',
        ],
        'category' => array(
            'type' => 'relationship',
            'title' => '分类',
            'name_field' => 'name',
        ),
    ],

];
