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
        Schema::create('students_school_info', function (Blueprint $table) {
            $table->id();

            // Students id
            $table->unsignedBigInteger('students_info_id');
            $table->foreign('students_info_id')->references('id')->on('students_info');

            // levels id
            $table->unsignedBigInteger('levels_id');
            $table->foreign('levels_id')->references('id')->on('levels');

            // Classes id
            $table->unsignedBigInteger('classes_id');
            $table->foreign('classes_id')->references('id')->on('classes');

            // Groups id
            $table->unsignedBigInteger('groups_id');
            $table->foreign('groups_id')->references('id')->on('groups');

            // Shifts id
            $table->unsignedBigInteger('shifts_id');
            $table->foreign('shifts_id')->references('id')->on('shifts');

            // Sections id
            $table->unsignedBigInteger('sections_id');
            $table->foreign('sections_id')->references('id')->on('sections');

            $table->date('registered_date');
            $table->integer('discount')->default(0);
            $table->string('active')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_school_info');
    }
};
