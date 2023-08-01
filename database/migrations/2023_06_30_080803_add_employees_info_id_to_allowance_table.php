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
        Schema::table('allowances', function (Blueprint $table) {
            $table->unsignedBigInteger('employees_info_id');
            $table->foreign('employees_info_id')->references('id')->on('employees_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('allowances', function (Blueprint $table) {
            //
        });
    }
};
