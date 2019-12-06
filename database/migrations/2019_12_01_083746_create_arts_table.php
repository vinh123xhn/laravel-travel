<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 255)->comment('Mã nghề thủ công');
            $table->string('name', 255)->comment('Tên nghề thủ công');
            $table->string('image', 255)->nullable()->comment('Ảnh đại diện');
            $table->integer('category')->nullable()->comment('Loại hình');
            $table->string('level_1', 255)->nullable()->comment('Loại hình chi tiết cấp 1');
            $table->string('level_2', 255)->nullable()->comment('Loại hình chi tiết cấp 2');
            $table->integer('status')->nullable()->comment('Hiện trạng');
            $table->text('subtitle')->nullable()->comment('Thuyết minh');
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
        Schema::dropIfExists('arts');
    }
}
