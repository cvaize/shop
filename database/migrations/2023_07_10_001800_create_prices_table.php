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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('currency_id');
            $table->unsignedDecimal('quantity')->default(1);
            $table->unsignedDecimal('value')->default(0);
            $table->unsignedDecimal('costs')->default(0);
            $table->unsignedDecimal('rebate')->default(0);
            $table->unsignedDecimal('tax')->default(0);
            $table->unsignedBigInteger('pos')->default(0);
            $table->unsignedSmallInteger('status')->default(1);
            $table->datetimes();

            $table->foreign('currency_id')->references('id')->on('currencies')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
