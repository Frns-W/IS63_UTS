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
        $table->id(); // Primary Key
        // Foreign Key ke tabel menus
        $table->foreignId('menu_id')->constrained()->onDelete('cascade');
        $table->string('customer_name');
        $table->integer('quantity');
        $table->integer('total_price');
        $table->string('payment_method'); // e.g., Cash, QRIS
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
