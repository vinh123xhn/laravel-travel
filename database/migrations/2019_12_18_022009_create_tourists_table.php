<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTouristsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 255)->comment('mã du khách');
            $table->string('name', 255)->comment('tên du khách');
            $table->integer('gender')->comment('giới tính');
            $table->string('birthday', 255)->nullable()->comment('ngày sinh');
            $table->string('address', 255)->nullable()->comment('địa chỉ');
            $table->string('phone', 20)->comment('số điện thoại');
            $table->string('email', 255)->nullable()->comment('thư điện tử');
            $table->string('cmt', 255)->comment('CCCD/CMT');
            $table->integer('type')->comment('loại du khách');
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
        Schema::dropIfExists('tourists');
    }
}
