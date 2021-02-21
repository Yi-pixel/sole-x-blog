<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('hidden_at')->nullable()->comment('隐藏时间');
            $table->timestamp('review_at')->nullable()->comment('审核时间');
            $table->unsignedBigInteger('user_id')->comment('用户ID')->index();
            $table->unsignedBigInteger('post_id')->comment('主题ID')->index();
            $table->mediumText('content')->comment('评论内容(支持 markdown)');
            $table->unsignedBigInteger('reply_id')->comment('评论了')->default(0)->index();
            $table->json('extra')->comment('其他有价值的信息')->default('{}');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
