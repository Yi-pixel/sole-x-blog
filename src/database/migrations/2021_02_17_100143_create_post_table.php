<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('title')->comment('文章标题')->index();
            $table->unsignedInteger('user_id')->comment('作者ID')->index();
            $table->unsignedInteger('category_id')->comment('分类ID')->index();
            $table->timestamp('hidden_at')->nullable()->comment('隐藏时间');
            $table->timestamp('review_at')->nullable()->comment('审核时间');
            $table->mediumText('content')->comment('文章内容');
            $table->unsignedInteger('views')->comment('浏览量')->default(0);
            $table->unsignedTinyInteger('status')->comment('状态: 0(草稿),1(已发布)')->index()->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}