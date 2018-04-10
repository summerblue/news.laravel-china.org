<?php


use App\Models\Category;

return [

    'title' => '分类',
    'heading' => '分类',
    'single' => '分类',
    'model' => Category::class,

    'columns' => [
        'id' => [
            'title' => 'ID'
        ],
        'name' => [
            'title' => '名称',
        ],
        'slug' => [
            'title' => 'Slug (use for URI)',
            'sortable' => false,
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
            'title' => '名称',
            'type' => 'text'
        ],
        'slug' => [
            'title' => 'Slug (use for URI)',
            'type' => 'text'
        ]
    ],

    'filters' => [
        'name' => [
            'title' => '名称',
        ]
    ],


];
