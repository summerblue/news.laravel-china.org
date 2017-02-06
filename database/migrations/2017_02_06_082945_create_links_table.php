<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->string('link')->nullable();
            $table->string('description')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_link')->nullable();
            $table->integer('order')->unsigned()->default(0)->index();
            $table->integer('category_id')->unsigned()->default(0)->index();
            $table->integer('issue_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('links');
    }
}
