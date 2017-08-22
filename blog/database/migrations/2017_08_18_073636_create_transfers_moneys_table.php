<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers_moneys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transfer_wallet');
            $table->integer('receive_wallet');
            $table->integer('amount');
            $table->text('describe');
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
        Schema::drop('transfers_moneys');
    }
}
