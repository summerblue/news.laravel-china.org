<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->index();
            $table->string('email')->nullable()->index();
            $table->string('phone')->nullable()->index();
            $table->string('remember_token')->nullable();
            $table->enum('is_banned', ['yes',  'no'])->default('no')->index();
            $table->string('image_url')->nullable();
            $table->integer('notification_count')->default(0)->index();
            $table->string('real_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('password', 60)->nullable();
            $table->boolean('verified')->default(false)->index();
            $table->string('verification_token')->nullable();
            $table->enum('email_notify_enabled', ['yes',  'no'])->default('yes')->index();
            $table->integer('github_id')->index();
            $table->string('wechat_openid')->nullable()->index();
            $table->string('wechat_unionid')->nullable()->index();
            $table->string('weibo_id')->nullable()->index();
            $table->string('register_source')->nullable()->index();
            $table->string('company')->nullable();
            $table->string('personal_website')->nullable();
            $table->string('introduction')->nullable();
            $table->timestamp('last_actived_at')->nullable();
            $table->softDeletes();
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
        Schema::drop('users');
    }
}
