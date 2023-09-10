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
        Schema::create('invoices', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('agreement_id');
            $table->date('due_date');
            $table->decimal('rent_amount', 10, 2); // Original rent amount
            $table->decimal('late_fee_amount', 10, 2)->default(0); // Late fee amount
            $table->decimal('total_amount', 10, 2); // Total amount including late fee
            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->enum('status', ['unpaid', 'paid', 'partially_paid'])->default('unpaid');
            $table->date('latefee_over_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
