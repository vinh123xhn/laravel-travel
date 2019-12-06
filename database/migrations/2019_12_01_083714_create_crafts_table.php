<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crafts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 255)->comment('Mã nghề thủ công');
            $table->string('name', 255)->comment('Tên nghề thủ công');
            $table->string('image', 255)->nullable()->comment('Ảnh đại diện');
            $table->integer('category')->nullable()->comment('Loại nhóm');
            $table->string('anniversary', 255)->nullable()->comment('Ngày giỗ tổ');
            $table->string('year_of_recognition', 255)->nullable()->comment('Năm công nhận');
            $table->integer('type')->nullable()->comment('Nghề hay làng nghề');
            $table->integer('type_of_crafts_village')->nullable()->comment('Loại làng nghề');
            $table->string('concrete', 255)->nullable()->comment('Cụ thể');
            $table->string('qualification', 255)->nullable()->comment('Trình độ kĩ thuật');
            $table->string('number_of', 255)->nullable()->comment('Số người tham gia');
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
        Schema::dropIfExists('crafts');
    }
}
