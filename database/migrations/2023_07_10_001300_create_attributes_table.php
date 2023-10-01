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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->string('value');
            $table->decimal('decimal_value', 12, 4)->nullable();
            $table->unsignedBigInteger('pos')->default(0);
            $table->unsignedSmallInteger('status')->default(1);
            $table->datetimes();

            $table->unique(['type_id', 'value']);

            $table->foreign('type_id')->references('id')->on('types')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
