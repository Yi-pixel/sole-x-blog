<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('url')->index()->comment('页面地址');
            $table->text('keywords')->comment('SEO 关键字');
            $table->text('description')->comment('SEO 描述');
            $table->string('title')->index()->comment('标题');
            $table->mediumText('body')->comment('页面源码');
            $table->unsignedTinyInteger('is_public')->comment('是否公开')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
