<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('title')->index()->comment('标题');
            $table->text('intro')->comment('介绍');
            $table->text('keywords')->comment('SEO 关键字');
            $table->text('description')->comment('SEO 描述');
            $table->unsignedFloat('sort')->comment('排序');
            $table->string('url')->index()->comment('页面地址（可能是有利于 SEO 友好的）');
            $table->unsignedBigInteger('parent_id')->index()->comment('父级分类 ID');
            $table->unsignedBigInteger('nested_left')->index()->comment('分类的左极限');
            $table->unsignedBigInteger('nested_right')->index()->comment('分类的右极限');
            $table->unsignedSmallInteger('layer')->comment('当前层级')->index();
            $table->unsignedTinyInteger('is_enable')->comment('是否启用（链接进入将转到 404）')->index();
            $table->unsignedTinyInteger('is_show')->comment('是否显示（仅控制是否显示）')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
