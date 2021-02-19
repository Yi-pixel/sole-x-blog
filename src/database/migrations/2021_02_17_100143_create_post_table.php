<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('文章标题')->index();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('author_id')->comment('作者ID')->index();
            $table->mediumText('content')->comment('评论内容');
            $table->unsignedInteger('category_id')->comment('分类ID')->index();
            $table->unsignedInteger('views')->comment('浏览量');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}