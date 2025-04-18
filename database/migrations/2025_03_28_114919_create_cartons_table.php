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
        Schema::create('cartons', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('packing_type');
            $table->date('send');
            $table->string('packing');
            $table->string('quality');
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
            $table->string('volume');
            $table->integer('qty');
            $table->string('weight');
            $table->integer('total_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartons');
    }
};
