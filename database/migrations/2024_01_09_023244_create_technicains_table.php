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
        Schema::create('technicains', function (Blueprint $table) {
            $table->id();
            $table->string('Tech_Fname')->nullable();
            $table->string('Tech_Lname')->nullable();
            $table->string('Tech_Address')->nullable();
            $table->string('Tech_Tel')->nullable();
            $table->unsignedBigInteger('DepartmentID')->nullable()->default(null);


            $table->foreign('DepartmentID')->references('id')->on('departments')->onDelete('cascade');
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
        Schema::dropIfExists('technicains');
    }
};
