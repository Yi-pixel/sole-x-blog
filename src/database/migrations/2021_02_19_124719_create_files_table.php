<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('path')->index()->comment('资源的保存地址（不含域名）');
            $table->string('filename')->comment('文件名')->index();
            $table->string('size')->index()->comment('资源的大小 kb');
            $table->string('storage_driver')->default('local')->index()->comment('资源的驱动器');
            $table->string('mime_type')->index()->comment('资源的类型');
            $table->string('attachable_type')->index()->comment('关联的类型');
            $table->string('attachable_group')->index()->comment('关联的附属组');
            $table->unsignedBigInteger('attachable_id')->index()->comment('关联的 ID');
            $table->char('hash', 40)->comment('文件的 SHA-1 hash 值')->index();
            $table->unsignedBigInteger('user_id')->comment('上传者')->index();
            $table->string('unsafe_cause')->comment('不安全的原因');
            $table->unsignedTinyInteger('is_safe')->comment('是否安全(不安全的内容不会被显示)')->default(0)->index();
            $table->unsignedTinyInteger('is_public')->comment('是否公开')->default(1)->index();
            $table->unsignedTinyInteger('is_enable')->comment('是否允许查看')->default(1)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
