<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('配置名称');
            $table->string('key', 100)->unique()->comment('设置项 key');
            $table->text('value')->nullable()->comment('设置项 value');
            $table->string('cast_type',20)->nullable()->default('string')->comment('变量类型');
            $table->string('desc')->nullable()->comment('描述');
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
