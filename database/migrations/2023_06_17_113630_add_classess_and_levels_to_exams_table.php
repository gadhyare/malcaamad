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
        Schema::table('exams', function (Blueprint $table) {

            // $table->bigInteger('levels_id')->unsigned()->change();

            // $table->bigInteger('levels_id')->unsigned()->change();



            //$table->biginteger('levels_id')->unsigned();
            $table->foreign('levels_id')->references('id')->on('evels')->onUpdate('cascade')->onDelete('cascade');

            //$table->biginteger('classes_id')->unsigned();
            $table->foreign('classes_id')->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exams', function (Blueprint $table) {

                $table->dropForeign('levels_id');
                $table->dropColumn('levels_id');
                $table->dropForeign('classes_id');
                $table->dropColumn('classes_id');
        });
    }
};
