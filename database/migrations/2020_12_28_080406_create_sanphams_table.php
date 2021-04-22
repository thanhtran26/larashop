<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
			$table->foreignId('loaisanpham_id')->constrained('loaisanpham');
			$table->string('tensanpham');
			$table->string('tensanpham_slug');
			$table->string('id_hang');
			$table->integer('soluong');
			$table->double('dongia');
			$table->double('khuyenmai');
			$table->double('dongia_km');
			$table->string('baohanh');
			$table->text('thongtinsanpham')->nullable();
			$table->string('hinhanh')->nullable();
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrentOnUpdate();
			$table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
