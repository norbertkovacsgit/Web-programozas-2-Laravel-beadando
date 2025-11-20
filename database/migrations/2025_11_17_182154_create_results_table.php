<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('pilot_id');
            $table->unsignedTinyInteger('position')->nullable();
            $table->string('failure')->nullable();
            $table->string('team')->nullable();
            $table->string('car_type')->nullable();
            $table->string('engine')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
