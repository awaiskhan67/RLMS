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
        Schema::create('companyprofiles', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(true);
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('phone2')->nullable(true);
            $table->string('address');
            $table->text('description');
            $table->string('website')->nullable(true);
            $table->string('twitter')->nullable(true);
            $table->string('facebook')->nullable(true);
            $table->string('instagram')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companyprofiles');
    }
};
