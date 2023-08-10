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
        Schema::create('lo_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loading_id')->constrained('loadings')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('bunker_id')->nullable()->constrained('bunkers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('lo_number');
            $table->string('product');
            $table->integer('qty');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lo_details');
    }
};
