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
        Schema::create('parlors', function (Blueprint $table) {
            $table->id('parlor_id');
            $table->string('name');
            $table->string('specialization');
            $table->decimal('fee', 10, 2)->default(0);
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('availability_status')->default(true);
            $table->decimal('rating', 3, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parlors');
    }
};