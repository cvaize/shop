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
        Schema::create('locales', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('language_id');
            $table->unsignedInteger('currency_id');
            $table->unsignedBigInteger('pos')->default(0);
            $table->unsignedSmallInteger('status')->default(1);
            $table->boolean('default')->default(false);
            $table->datetimes();

            $table->foreign('language_id')->references('id')->on('languages')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('currency_id')->references('id')->on('currencies')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locales');
    }
};
