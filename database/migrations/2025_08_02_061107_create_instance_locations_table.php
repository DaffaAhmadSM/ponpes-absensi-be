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
        Schema::create('instance_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('longitude', 11, 8);
            $table->decimal('latitude', 10, 8);
            $table->boolean('default')->default(false)->index();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instance_locations');
    }
};
