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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial_no');
            $table->string('name');
            $table->bigInteger('category_id');
            $table->string('country');
            $table->string('district');
            $table->string('city');
            $table->string('street');
            $table->string('image')->nullable();
            $table->string('shortDes')->nullable();
            $table->bigInteger('entry_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
