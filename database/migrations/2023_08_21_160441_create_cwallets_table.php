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
        Schema::create('cwallets', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable(true);
            $table->string('currency')->nullable(true);
            $table->decimal('initial_blance', 10, 2);
            $table->decimal('credit_mount', 10, 2);
            $table->decimal('debit_amount', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cwallets');
    }
};
