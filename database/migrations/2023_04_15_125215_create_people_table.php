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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_id');

            $table->enum('gender', ['male', 'female']);
            $table->string('name');
            $table->string('nick_name')->nullable();
            $table->date('birth_day')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('death_day')->nullable();
            $table->string('death_place')->nullable();
            $table->text('bio')->nullable();

            $table->foreign('family_id')->references('id')->on('families');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
