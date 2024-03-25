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
        Schema::create('organizations_table', function (Blueprint $table) {
            $table->id();
            $table->string('Province');
            $table->string('Coordinator');
            $table->string('Contact');
            $table->string('Elderly_Num');
            $table->json('ActivitiesArray');
            $table->json('ChallengesArray');
            $table->json('RecommendationArray');
            $table->string('B_Account');
            $table->string('B_Name');
            $table->string('B_Branch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations_table');
    }
};
