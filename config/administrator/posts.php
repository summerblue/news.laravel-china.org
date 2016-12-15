<?php


use App\Models\Post;


return [

    'title' => '文章',
    'heading' => '文章',
    'single' => '文章',

    'model' => Post::class,

    'columns' => [
        'id' => [
            'title' => 'ID'
        ],
        'title' => [
            'title' => '标题',
        ],
        'body' => [
            'title' => '内容',
            'sortable' => false,
            'output' => function($value)
            {
                return make_excerpt($value);
            },
        ],
        'user_name' => [
            'title' => '作者',
            'relationship' => 'user', //this is the name of the Eloquent relationship method!
            'select' => "(:table).name",
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
            'type' => 'text'
        ],
        'position' => array(
            'title' => '文章类型',
            'type'     => 'enum',
            'options'  => [
                'undefined' => '一般文章',
                'big_banner'  => '首页大图文章',
                'side_banner'  => '首页顶部右边三个',
            ],
            'value' => 'undefined',
        ),
        'cover' => [
            'title'             => '文章封面',
            'type'              => 'image',
            'location'          => public_path() . '/uploads/covers/',
            'naming'            => 'random',
            'length'            => 20,
            'size_limit'        => 10,
            'display_raw_value' => false,
        ],
        'category' => array(
            'type' => 'relationship',
            'title' => '分类',
            'name_field' => 'name',
        ),
        'user' => [
            'title' => '作者',
            'type' => 'relationship',
            'relationship' => 'user', //this is the name of the Eloquent relationship method!
            'select' => "(:table).name",
        ],
        'excerpt' => [
            'title' => '简介',
            'type' => 'textarea',
        ],
        'body_original' => [
            'title' => 'Markdown 内容（保存时自动生成内容）',
            'type' => 'textarea',
        ],
        'created_at' => [
            'title' => '文章发布时间',
            'type' => 'datetime',
        ],
    ],

    'filters' => [
        'title' => [
            'title' => '标题',
        ],
        'position' => array(
            'title' => '文章类型',
            'type'     => 'enum',
            'options'  => [
                'undefined' => '一般文章',
                'big_banner'  => '首页大图文章',
                'side_banner'  => '首页顶部右边三个',
            ],
        ),
        'category' => array(
            'type' => 'relationship',
            'title' => '分类',
            'name_field' => 'name',
        ),
    ],

];
