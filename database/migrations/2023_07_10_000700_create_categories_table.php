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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('domain_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedSmallInteger('status')->default(1);
            $table->string('slug');
            $table->datetimes();

            $table->unique(['domain_id', 'slug']);

            $table->foreign('parent_id')->references('id')->on('categories')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('domain_id')->references('id')->on('domains')
                ->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
