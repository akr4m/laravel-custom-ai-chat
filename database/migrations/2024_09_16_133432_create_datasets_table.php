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
        \DB::statement('CREATE EXTENSION IF NOT EXISTS vector;');

        Schema::create('datasets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('path', 2048)->nullable();
            $table->longText('text');
            $table->vector('embedding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasets');
    }
};
