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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('billing_cycles_id');
            $table->foreign('billing_cycles_id')->references('id')->on('billing_cycles');


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


            $table->unsignedBigInteger('feestypes_id');
            $table->foreign('feestypes_id')->references('id')->on('feestypes');


            $table->integer('want')->default(0) ->nullable();
            $table->integer('discount')->default(0) ->nullable();

            $table->integer('account_statuse')->default(0)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
