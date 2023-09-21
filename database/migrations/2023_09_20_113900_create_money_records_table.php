<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable()->comment('用戶id');
            $table->unsignedBigInteger('in_category_id')->nullable()->comment('收入類別id');
            $table->unsignedBigInteger('out_category_id')->nullable()->comment('支出類別id');
            $table->string('record_no')->nullable()->comment('單據編號');
            $table->string('brief')->nullable()->comment('摘要簡介');
            $table->integer('amount')->nullable()->comment('金額');
            $table->string('status')->nullable()->comment('狀態');
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
        Schema::dropIfExists('money_records');
    }
}
