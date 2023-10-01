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
            $table->unsignedBigInteger('user_id');
            $table->string('channel');
            $table->string('invoiceno')->nullable();
            $table->dateTime('date_payment')->nullable();
            $table->dateTime('date_delivery')->nullable();
            $table->unsignedSmallInteger('status_payment')->default(0);
            $table->unsignedSmallInteger('status_delivery')->default(0);
            $table->string('cdate', 10)->nullable();
            $table->string('cmonth', 7)->nullable();
            $table->string('cweek', 7)->nullable();
            $table->string('cwday', 1)->nullable();
            $table->string('chour', 2)->nullable();
            $table->unsignedInteger('language_id')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->text('comment')->nullable();

            $table->datetimes();

            $table->foreign('language_id')->references('id')->on('languages')
                ->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('currency_id')->references('id')->on('currencies')
                ->cascadeOnUpdate()->cascadeOnDelete();
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
