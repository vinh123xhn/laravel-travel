<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTouristAndTouristAcommodationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_and_tourist_acommodation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tourist')->comment('id khách du lịch');
            $table->integer('tourist_acommodation')->comment('id cơ sở lưu trú');
            $table->string('start_date', 255)->comment('Ngày nhận phòng');
            $table->string('end_date', 255)->comment('Ngày trả phòng');
            $table->string('year', 255)->comment('năm');
            $table->string('room', 255)->comment('phòng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourist_and_tourist_acommodation');
    }
}
