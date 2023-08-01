<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students_info', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('fathers_id');
            $table->foreign('fathers_id')->references('id')->on('fathers');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('nationality');
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_info');
    }
};
