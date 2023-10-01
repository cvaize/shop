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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('language_id');
            $table->string('label');
            $table->morphs('ref');
            $table->datetimes();

            $table->unique(['ref_type', 'ref_id', 'language_id', 'label']);

            $table->foreign('language_id')->references('id')->on('languages')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
