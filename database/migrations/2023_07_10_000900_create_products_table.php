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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedSmallInteger('status')->default(1);
            $table->unsignedBigInteger('type_id');
            $table->string('slug');
            $table->string('code');
            $table->json('config')->nullable();
            $table->unsignedDecimal('scale')->default(0);
            $table->unsignedDecimal('rating', 4)->default(0);
            $table->unsignedBigInteger('ratings')->default(0);
            $table->boolean('instock')->default(false);
            $table->unsignedDecimal('boost')->default(1);
            $table->datetimes();

            $table->unique(['slug']);
            $table->unique(['code']);

            $table->foreign('type_id')->references('id')->on('types')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('parent_id')->references('id')->on('products')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
