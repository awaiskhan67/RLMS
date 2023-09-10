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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial_no');
            $table->string('agreement_no')->unique();
            $table->string('agreement_name');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('tenant_id');
            $table->date('start_date');
            $table->tinyInteger('status')->default(0);
            $table->string('payment_frequency');
            $table->string('attachment');
            $table->decimal('rent', 10, 2);
            $table->decimal('security_money', 10, 2);
            $table->integer('period');
            $table->integer('increment');
            $table->date('next_rent_due');
            $table->text('description');

            $table->tinyInteger('late_fee_active')->default(0);
            $table->integer('late_fee_days')->nullable();
            $table->decimal('late_fee_amount', 10, 2)->nullable();

            $table->unsignedBigInteger('entry_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agreements');
    }
};
