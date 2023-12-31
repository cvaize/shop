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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('language_id')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedSmallInteger('status')->default(1);
            $table->boolean('superuser')->default(false);
            $table->datetimes();

            $table->foreign('language_id')->references('id')->on('languages')
                ->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('currency_id')->references('id')->on('currencies')
                ->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
