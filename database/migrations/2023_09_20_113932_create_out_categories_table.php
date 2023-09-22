<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('out_title')->nullable()->comment('支出標題');
            $table->string('description')->nullable()->comment('內容描述');
            $table->timestamps();
            $table->softDeletes('deleted_at')->nullable()->comment('刪除日期');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('out_categories');
    }
}
