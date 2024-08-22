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
        Schema::table('organizations_table', function (Blueprint $table) {
            $table->string('eProvince');
            $table->string('diocese');
            $table->string('grant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organizations_table', function (Blueprint $table) {
            $table->dropColumn('eProvince');
            $table->dropColumn('diocese');
            $table->dropColumn('grant');
        });
    }
};
