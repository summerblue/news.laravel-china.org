<?php

use Illuminate\Database\Seeder;
use App\Models\Issue;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class IssueTableSeeder extends Seeder {

    public function run()
    {
        $issues = factory(Issue::class)->times(15)->make();

        Issue::insert($issues->toArray());

        $issue = factory(Issue::class)->times(2)->make()->each(function ($issue, $i) {
            $issue->is_published = 'no';
        });
        Issue::insert($issue->toArray());
    }

}