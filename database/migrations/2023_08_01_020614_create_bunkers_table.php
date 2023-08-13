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
        Schema::create('bunkers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kri_id')->constrained('kris')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tongkang_id')->constrained('tongkangs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('bunker_location');
            $table->string('bbm');
            $table->timestamp('start', $precision = 0);
            $table->timestamp('stop', $precision = 0);
            $table->integer('vol_lo');
            $table->integer('vol_ar');
            $table->string('surveyor');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bunkers');
    }
};
