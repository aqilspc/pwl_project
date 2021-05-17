<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBansosItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bansos_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bansos_donation_id');
            $table->foreign('bansos_donation_id')->references('id')->on('bansos_donations');
            $table->unsignedBigInteger('bansos_item_id');
            $table->foreign('bansos_item_id')->references('id')->on('bansos_items');
            $table->unsignedBigInteger('bansos_receiver_id');// default id 1 unsigned
            $table->foreign('bansos_receiver_id')->references('id')->on('bansos_receivers'); 
            $table->string('name_item');
            $table->string('status_item'); // done , not -> diterima atau belum default not
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
        Schema::dropIfExists('bansos_items');
    }
}
