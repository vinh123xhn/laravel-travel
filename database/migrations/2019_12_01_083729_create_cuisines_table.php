<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuisinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 255)->comment('Mã ẩm thực');
            $table->string('name', 255)->comment('Tên ẩm thực');
            $table->string('image', 255)->nullable()->comment('Ảnh đại diện');
            $table->integer('category')->nullable()->comment('Loại');
            $table->integer('taste')->nullable()->comment('Vị chính');
            $table->text('material')->nullable()->comment('Nguyên liệu');
            $table->integer('type')->nullable()->comment('Kiểu');
            $table->integer('kind_of_dish')->nullable()->comment('Loại món');
            $table->integer('health')->nullable()->comment('Sức khỏe');
            $table->integer('season')->nullable()->comment('Mùa');
            $table->integer('ingredient')->nullable()->comment('Nguồn gốc nguyên liệu');
            $table->integer('place')->nullable()->comment('Nơi chế biến');
            $table->integer('use')->nullable()->comment('Sử dụng');
            $table->text('subtitle')->nullable()->comment('Thuyết minh');
            $table->text('cook')->nullable()->comment('Cách chế biến');
            $table->string('space', 255)->nullable()->comment('Không gian');
            $table->string('music', 255)->nullable()->comment('Ca múa nhạc');
            $table->string('costume', 255)->nullable()->comment('Trang phục');
            $table->string('ceremony', 255)->nullable()->comment('Nghi lễ');
            $table->string('management_unit', 255)->nullable()->comment('Đơn vị quản lý');
            $table->string('celebrity', 255)->nullable()->comment('Danh nhân liên quan');
            $table->string('location', 255)->nullable()->comment('Địa điểm liên quan');
            $table->string('event', 255)->nullable()->comment('Sự kiện liên quan');
            $table->string('document', 255)->nullable()->comment('Tài liệu liên quan');
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
        Schema::dropIfExists('cuisines');
    }
}
