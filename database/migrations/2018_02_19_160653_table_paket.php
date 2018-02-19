<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablePaket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('paket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('min_deposit');
            $table->integer('max_deposit');
            $table->integer('contract');
            $table->text('sk');
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
        Schema::dropIfExists('paket');
        //
    }
}
