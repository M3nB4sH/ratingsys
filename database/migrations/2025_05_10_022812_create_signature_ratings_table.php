<?php

use App\Models\Rating;
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
        Schema::create('signature_ratings', function (Blueprint $table) {
            $table->id();
            $table->boolean('teacher_sign')->default(0);
            $table->boolean('manager_sign')->default(0);
            $table->boolean('director_sign')->default(0);
            $table->foreignIdFor(Rating::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signature_ratings');
    }
};
