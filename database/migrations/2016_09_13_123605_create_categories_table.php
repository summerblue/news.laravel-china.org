<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->text('body');
            $table->string('slug')->index();
            $table->integer('post_count')->unsigned()->default(0);
            $table->integer('order')->unsigned()->default(0);
            $table->tinyInteger('is_recommended')->unsigned()->default(0);
            $table->text('description')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
