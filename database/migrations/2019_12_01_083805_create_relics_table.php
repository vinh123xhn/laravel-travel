<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 255)->comment('Mã di tích');
            $table->string('name', 255)->comment('Tên di tích');
            $table->string('image', 255)->nullable()->comment('Ảnh đại diện');
            $table->integer('relics_level')->nullable()->comment('Cấp di tích');
            $table->integer('category')->nullable()->comment('Phân loại');
            $table->string('num_of_recognition_decisions')->nullable()->comment('Số quyết định công nhận');
            $table->string('year_of_recognition', 255)->nullable()->comment('Năm công nhận');
            $table->integer('status')->nullable()->comment('Tình trạng hiện nay');
            $table->string('age', 255)->nullable()->comment('Niên đại');
            $table->text('subtitle')->nullable()->comment('Thuyết minh');
            $table->text('detection_process')->nullable()->comment('Quá trình phát hiện');
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
        Schema::dropIfExists('relics');
    }
}
