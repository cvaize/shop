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
        Schema::create('relationships', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('type_id');
            $table->string('parent_type');
            $table->unsignedBigInteger('parent_id');
            $table->string('relationship_type');
            $table->unsignedBigInteger('relationship_id');
            $table->unsignedBigInteger('pos')->default(0);
            $table->unsignedSmallInteger('status')->default(1);
            $table->datetimes();

            $table->index(['parent_type', 'parent_id', 'relationship_type', 'relationship_id'], 'relationships_index_1');
            $table->unique(['parent_type', 'parent_id', 'type_id', 'relationship_type', 'relationship_id'], 'relationships_unique_1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relationships');
    }
};
