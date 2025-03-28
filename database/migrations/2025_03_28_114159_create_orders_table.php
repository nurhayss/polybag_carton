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
            $table->string('order_no')->unique();
            $table->string('po_no')->unique();
            $table->date('date');
            $table->date('qty_garment');
            $table->string('buyer');
            $table->date('gmt_delivery');
            $table->date('arrived_at');
            $table->string('location');
            $table->string('shipment');
            $table->string('packing');
            $table->string('plastic_quality');
            $table->string('thickness');
            $table->string('print_warning');
            $table->string('follow_up');
            $table->date('follow_up_date');
            $table->string('marketing');
            $table->date('marketing_date');
            $table->string('checked_by');
            $table->date('checked_date');
            $table->string('purchasing');
            $table->date('purchasing_date');
            $table->string('created_by');
            $table->date('created_date');
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
