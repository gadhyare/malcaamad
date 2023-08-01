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
        Schema::create('subjects_distributions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('subjects_id');
            $table->foreign('subjects_id')->references('id')->on('subjects');


            $table->unsignedBigInteger('levels_id');
            $table->foreign('levels_id')->references('id')->on('levels');

            // Classes id
            $table->unsignedBigInteger('classes_id');
            $table->foreign('classes_id')->references('id')->on('classes');

            $table->integer('max_mark');
            $table->integer('min_mark');
            $table->integer('rank');


            $table->string('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects_distributions');
    }
};
