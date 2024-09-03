<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('t_customers')->onDelete('cascade');
            $table->dateTime('order_date');
            $table->string('payment_method');
            $table->decimal('total', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_orders');
    }
};
