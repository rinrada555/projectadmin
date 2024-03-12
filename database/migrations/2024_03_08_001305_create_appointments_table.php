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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->Date('Appointment_Date')->nullable();
            $table->Time('Appointment_Time')->nullable();
            $table->string('CarImage')->nullable();
            $table->unsignedBigInteger('CarID')->nullable()->default(null);
            $table->foreign('CarID')->references('id')->on('cars')->onDelete('cascade');

            $table->unsignedBigInteger('CustomerID')->nullable()->default(null);
            $table->foreign('CustomerID')->references('id')->on('customers')->onDelete('cascade');

            $table->unsignedBigInteger('AppointmentStatusID')->nullable()->default(null);
            $table->foreign('AppointmentStatusID')->references('id')->on('status_appointments')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
