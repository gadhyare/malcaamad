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
        Schema::create('employee_deductions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employees_info_id');
            $table->foreign('employees_info_id')->references('id')->on('employees_info');
            $table->unsignedBigInteger('billing_cycles_id');
            $table->foreign('billing_cycles_id')->references('id')->on('billing_cycles');
            $table->integer('amount')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_deductions');
    }
};
