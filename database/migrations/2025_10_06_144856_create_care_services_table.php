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
        Schema::create('care_services', function (Blueprint $table) {
            $table->id();
            $table->text('care_services_name');
            $table->integer('single_services_price');
            $table->integer('triple_services_price');
            $table->integer('seven_services_price');
            $table->text('care_services_description');
            $table->text('care_services_image')->nullable();
            $table->enum('care_services_priority', ['low', 'medium', 'high', 'critical'])->default('medium');
            $table->boolean('care_services_status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('care_services');
    }
};
