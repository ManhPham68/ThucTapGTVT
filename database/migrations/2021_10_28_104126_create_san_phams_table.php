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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_sp');
            $table->float('gia_nhap_sp')->nullable();
            $table->float('gia_ban_sp')->nullable();
            $table->string('anh_sp')->nullable();
            $table->integer('trang_thai')->nullable();
            $table->text('thong_tin_sp')->nullable();
            $table->integer("hang_san_xuat_id");
            $table->integer("loai_san_pham_id");
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
        Schema::dropIfExists('san_phams');
    }
}
