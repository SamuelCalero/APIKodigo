<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();
            $table->foreign('reservation_id')
            ->references('id')
            ->on('reservations')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('service_id')
            ->references('id')
            ->on('services')
            ->onDelete('cascade')
            ->onUpdate('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('reservations_services');
    }
};
