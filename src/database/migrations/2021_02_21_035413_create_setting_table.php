<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 30)->index()->comment('设置名称');
            $table->mediumText('value')->comment('配置内容');
            $table->string('comment')->comment('注释说明');
            $table->unsignedTinyInteger('is_available')->comment('是否可用')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}
