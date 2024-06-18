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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->date('dob')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable(); 
            $table->string('gender')->nullable();
            $table->integer('tamil')->nullable();
            $table->integer('english')->nullable();
            $table->integer('maths')->nullable();
            $table->integer('science')->nullable();
            $table->integer('soc_science')->nullable();
            $table->integer('total_marks')->nullable();
            $table->float('percentage', 5, 2)->nullable();
            $table->string('grade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
