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
        Schema::create('marriages', function (Blueprint $table) {
            $table->unsignedBigInteger('person_one_id');
            $table->unsignedBigInteger('person_two_id');
            $table->primary(['person_one_id', 'person_two_id']);

            $table->foreign('person_one_id')->references('id')->on('people');
            $table->foreign('person_two_id')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriages');
    }
};
