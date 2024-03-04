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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained('users');
            $table->foreignId('customer_id')->constrained('users');
            $table->foreignId('car_detail_id')->constrained('car_details');
            $table->decimal('commission', 10, 2);
            $table->decimal('sale_value', 10, 2);
            $table->enum('status', ['in_progress', 'canceled', 'completed'])->default('in_progress');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
