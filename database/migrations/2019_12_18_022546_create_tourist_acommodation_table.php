<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTouristAcommodationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_acommodation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->comment('tên cơ sở giáo dục');
            $table->string('address', 255)->comment('địa chỉ');
            $table->string('phone', 20)->comment('số điện thoại');
            $table->string('email', 255)->comment('thư điện tử');
            $table->string('fax', 255)->comment('fax');
            $table->string('website', 255)->comment('website');
            $table->string('room', 255)->comment('số phòng');
            $table->string('min_price', 255)->comment('giá rẻ nhất');
            $table->string('max_price', 255)->comment('giá đắt nhất');
            $table->integer('type')->comment('loại cơ sở');
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
        Schema::dropIfExists('tourist_acommodation');
    }
}
