<?php

use App\Models\Activity;
use App\Models\Competence;
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
        Schema::create('competence_activities', function (Blueprint $table) {
            $table->foreignIdFor(Activity::class);
            $table->foreignIdFor(Competence::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competence_activities');
    }
};
