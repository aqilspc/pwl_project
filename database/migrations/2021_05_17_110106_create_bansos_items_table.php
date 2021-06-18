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
            $table->date('date');
            $table->foreign('bansos_donation_id')->references('id')->on('bansos_donations');
            $table->unsignedBigInteger('bansos_contributor_id');
            $table->foreign('bansos_contributor_id')->references('id')->on('bansos_contributors');
            $table->unsignedBigInteger('total_item'); 
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
