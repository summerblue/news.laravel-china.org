<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array(
            array(
                'id'          => 1,
                'name'        => '新闻',
                'slug'        => 'news',
            ),
            array(
                'id'          => 2,
                'name'        => '教程',
                'slug'        => 'tutorials',
            ),
            array(
                'id'          => 3,
                'name'        => '扩展',
                'slug'        => 'packages',
            ),
            array(
                'id'          => 4,
                'name'        => '资源',
                'slug'        => 'resources',
            ),
            array(
                'id'          => 5,
                'name'        => '书籍',
                'slug'        => 'books',
            ),
        ));
    }
}
