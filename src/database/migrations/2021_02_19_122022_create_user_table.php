<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name', 30)->comment('用户名（可用于登录）')->unique();
            $table->string('password_hash', 200)->comment('密码 Hash');
            $table->string('nickname', 30)->comment('昵称')->unique();
            $table->string('email', 100)->comment('邮箱（可用于登录）')->unique();
            $table->string('ua')->comment('userAgent');
            $table->string('location')->comment('所在城市');
            $table->string('company')->comment('所在公司');
            $table->string('job_title')->comment('职称');
            $table->char('phone', 11)->comment('手机号（可用于登录）')->unique();
            $table->text('intro')->comment('个人介绍');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
