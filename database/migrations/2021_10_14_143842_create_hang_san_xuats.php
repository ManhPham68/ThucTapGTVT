<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHangSanXuats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hang_san_xuats', function (Blueprint $table) {
            $table->id();
            $table->string('ten_hangsx');
            $table->string('thong_tin');

            $table->softDeletes();
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
        Schema::dropIfExists('hang_san_xuats');
        Schema::table('hang_san_xuats', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
