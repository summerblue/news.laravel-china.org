<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->string('cover')->nullable();
            $table->text('body');
            $table->string('slug')->index();
            $table->string('position')->default('undefined')->index();
            $table->text('body_original')->nullable();
            $table->tinyInteger('user_id')->unsigned()->default(0);
            $table->integer('category_id')->unsigned()->default(0);
            $table->integer('view_count')->unsigned()->default(0);
            $table->integer('order')->unsigned()->default(0);
            $table->tinyInteger('is_recommended')->unsigned()->default(0);
            $table->text('excerpt')->nullable();
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
		Schema::drop('posts');
	}

}
