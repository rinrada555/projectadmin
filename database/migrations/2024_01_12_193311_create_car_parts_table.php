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
        Schema::create('car_parts', function (Blueprint $table) {
            $table->id();
            $table->DATE('CarPart_Lot')->nullable();
            $table->string('CarPart_Name')->nullable();
            $table->float('Unit_Price')->nullable();
            $table->Integer('Total_Part_Receive')->nullable();
            $table->Integer('Total_Part_Left')->nullable();
            $table->unsignedInteger('Total_Part_Reorder')->default(20);
            $table->float('Part_Price')->nullable();
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
        Schema::dropIfExists('car_parts');
    }
};
