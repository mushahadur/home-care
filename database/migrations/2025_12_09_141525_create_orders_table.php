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
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('care_service_id')->constrained('care_services')->onDelete('restrict');
        $table->string('service_plan');
        $table->string('user_name');
        $table->string('user_email');
        $table->string('user_phone');
        $table->text('user_address');
         // Files
        $table->string('prescription')->nullable();
        $table->text('notes')->nullable();

        $table->date('preferred_date')->index(); 
        $table->string('preferred_time');

        $table->decimal('tax', 10, 2)->nullable();
        $table->decimal('total_price', 10, 2);
        $table->string('status')->default('pending')->index();

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
