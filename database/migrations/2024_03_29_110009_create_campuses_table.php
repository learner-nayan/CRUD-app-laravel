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
        Schema::create('campuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->integer('number_of_teachers');
            $table->integer('number_of_students');
            $table->date('est_date');
            $table->integer('total_class')->nullable();
            $table->time('opening_hour');
            $table->time('closing_hour');
            $table->enum('teachers_gender', ['male', 'female', 'other']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};
