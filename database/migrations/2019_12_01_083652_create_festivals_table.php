<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 255)->comment('Mã lễ hội');
            $table->string('name', 255)->comment('Tên lễ hội');
            $table->integer('festival_level')->nullable()->comment('Cấp lễ hội');
            $table->integer('organizational_level')->nullable()->comment('Cấp tổ chức');
            $table->string('image', 255)->nullable()->comment('Ảnh đại diện');
            $table->integer('calendar_type')->nullable()->comment('Kiểu lịch');
            $table->string('frequency', 255)->nullable()->comment('Tần xuất');
            $table->integer('day')->nullable()->comment('Cố định ngày');
            $table->string('start_date', 255)->nullable()->comment('Ngày bắt đầu');
            $table->string('end_date', 255)->nullable()->comment('Ngày kết thúc');
            $table->text('subtitle')->nullable()->comment('Thuyết minh');
            $table->string('status', 255)->nullable()->comment('Tình trạng');
            $table->integer('category')->nullable()->comment('Phân loại');
            $table->integer('characteristics')->nullable()->comment('Đặc điểm');
            $table->integer('nation')->nullable()->comment('Dân tộc');
            $table->integer('religion')->nullable()->comment('Tôn giáo');
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
        Schema::dropIfExists('festivals');
    }
}
