<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBansosDonationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bansos_donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bansos_category_id');
            // $table->foreign('bansos_category_id')->references('id')->on('bansos_categories');
            $table->unsignedBigInteger('bansos_receiver_id');// default id 1 unsigned
            //$table->foreign('bansos_receiver_id')->references('id')->on('bansos_receivers');
            $table->string('bansos_banner'); 
            $table->string('name_donation');
            $table->unsignedBigInteger('total_donation');
            $table->date('date_donation');
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
        Schema::dropIfExists('bansos_donation');
    }
}
