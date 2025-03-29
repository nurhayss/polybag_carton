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
        Schema::create('polybags', function (Blueprint $table) {
            $table->id();
            $table->string('pack');
            $table->integer('size');
            $table->integer('lenght');
            $table->integer('width');
            $table->integer('qty_order');
            $table->integer('isi');
            $table->integer('kebutuhan');
            $table->integer('qty_beli');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polybags');
    }
};
