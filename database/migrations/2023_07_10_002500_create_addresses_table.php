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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('salutation')->nullable();
            $table->string('company')->nullable();
            $table->string('vat_id')->nullable();
            $table->string('title')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('postal')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('language')->nullable();
            $table->unsignedInteger('language_id')->nullable();
            $table->string('telephone')->nullable();
            $table->string('telefax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('inn')->nullable();
            $table->string('ogrn')->nullable();
            $table->unsignedDecimal('longitude', 14, 6)->nullable();
            $table->unsignedDecimal('latitude', 14, 6)->nullable();
            $table->date('birthday')->nullable();
            $table->unsignedBigInteger('pos')->default(0);
            $table->unsignedSmallInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages')
                ->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
