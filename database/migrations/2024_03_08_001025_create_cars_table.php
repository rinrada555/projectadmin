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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->String('License_Plate')->nullable();
            $table->String('Registration_Provice')->nullable();
            $table->String('Car_Color')->nullable();
            $table->String('Car_Make')->nullable();
            $table->String('Car_Model')->nullable();
            $table->String('Car_Year')->nullable();
            $table->String('CarVIN')->nullable();
            $table->String('Engine_Number')->nullable();
            $table->unsignedBigInteger('CustomerID')->nullable()->default(null);

            $table->foreign('CustomerID')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('cars');
    }
};
