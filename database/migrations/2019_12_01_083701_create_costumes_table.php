<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 255)->comment('Mã trang phục');
            $table->string('name', 255)->comment('Tên trang phục');
            $table->string('image', 255)->nullable()->comment('Ảnh đại diện');
            $table->string('material', 255)->nullable()->comment('Chất liệu');
            $table->integer('category')->nullable()->comment('Phân loại');
            $table->integer('nation')->nullable()->comment('Dân tộc');
            $table->text('subtitle')->nullable()->comment('Thuyết minh');
            $table->integer('religion')->nullable()->comment('Tôn giáo');
            $table->integer('status')->nullable()->comment('Tình trạng hiện nay');
            $table->integer('purpose')->nullable()->comment('Mục đích sử dụng');
            $table->string('management_unit', 255)->nullable()->comment('Đơn vị quản lý');
            $table->string('age', 255)->nullable()->comment('Thời kỳ, triều đại');
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
        Schema::dropIfExists('costumes');
    }
}
