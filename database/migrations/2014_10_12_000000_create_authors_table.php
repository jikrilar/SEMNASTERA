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
        Schema::create('authors', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->enum('gender',['male', 'female'])->nullable();
            $table->string('picture')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('institution')->nullable();
            $table->foreignId('cost_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
