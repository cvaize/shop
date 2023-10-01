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
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coupon_id');
            $table->string('code')->unique();
            $table->unsignedBigInteger('count');
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->timestamps();

            $table->index(['start', 'end']);

            $table->foreign('coupon_id')->references('id')->on('coupon_codes')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_codes');
    }
};
