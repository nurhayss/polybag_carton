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
            $table->string('order_no');
            $table->string('po_no')->unique();
            $table->string('style');
            $table->date('date');
            $table->integer('qty_garment');
            $table->string('buyer');
            $table->date('gmt_delivery');
            $table->date('arrived_at')->nullable();
            $table->string('location');
            $table->string('shipment');
            $table->json('packing');
            $table->string('plastic_quality');
            $table->string('thickness');
            $table->string('print_warning');
            $table->string('follow_up')->nullable();
            $table->date('follow_up_date')->nullable();
            $table->string('marketing')->nullable();
            $table->date('marketing_date')->nullable();
            $table->string('checked_by')->nullable();
            $table->date('checked_date')->nullable();
            $table->string('purchasing')->nullable();
            $table->date('purchasing_date')->nullable();
            $table->string('created_by');
            $table->date('created_date');
            $table->integer('status');
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
