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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            // students id
            $table->unsignedBigInteger('students_info_id');
            $table->foreign('students_info_id')->references('id')->on('students_info');

            // shifts id
            $table->unsignedBigInteger('shifts_id');
            $table->foreign('shifts_id')->references('id')->on('shifts');

            // sections id
            $table->unsignedBigInteger('sections_id');
            $table->foreign('sections_id')->references('id')->on('sections');

            // groups id
            $table->unsignedBigInteger('groups_id');
            $table->foreign('groups_id')->references('id')->on('groups');

            // subjects_distributions id
            $table->unsignedBigInteger('subjects_distributions_id');
            $table->foreign('subjects_distributions_id')->references('id')->on('subjects_distributions');




            $table->biginteger('levels_id')->unsigned();
            $table->foreign('levels_id')->references('id')->on('evels')->onUpdate('cascade')->onDelete('cascade');

            $table->biginteger('classes_id')->unsigned();
            $table->foreign('classes_id')->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');


            $table->integer('qu1')->default(0)->nullable();
            $table->integer('ex1')->default(0)->nullable();
            $table->integer('qu2')->default(0)->nullable();
            $table->integer('ex2')->default(0)->nullable();
            $table->integer('att')->default(0)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
