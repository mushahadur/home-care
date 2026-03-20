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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('user_id')->nullable();

        // Customer Info
        $table->string('name');
        $table->string('email');
        $table->string('phone');
        $table->text('address');

        // Payment
        $table->enum('payment_method', ['credit_card', 'paypal', 'bank_transfer']);
        $table->string('card_number')->nullable();
        $table->string('expiry')->nullable();
        $table->string('cvv')->nullable();
        $table->string('card_name')->nullable();

        // Notes
        $table->text('notes')->nullable();

        // Files
        $table->string('prescription')->nullable();
        $table->json('other_documents')->nullable();

        // Service
        $table->unsignedBigInteger('service_id');
        $table->decimal('service_charge', 10, 2);
        $table->decimal('tax', 10, 2);
        $table->decimal('total', 10, 2);
        $table->string('status')->default('pending');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
