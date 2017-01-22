<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $seeders = [
        'UsersTableSeeder',
        'CategoryTableSeeder',
        'IssueTableSeeder',
        'PostTableSeeder',
    ];

    protected $production_seeders = [
        'UsersTableSeeder',
        'CategoryTableSeeder',
        'PostTableSeeder',
    ];

    public function run()
    {
        insanity_check();

        Model::unguard();

        $seeders = \App::environment('production') ? $this->production_seeders : $this->seeders;

        foreach ($seeders as $seedClass) {
            $this->call($seedClass);
        }

        Model::reguard();
    }
}
