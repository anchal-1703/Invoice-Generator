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
        Schema::table('parties', function (Blueprint $table) {
            $table->dropUnique(['branch_address']); // Remove unique constraint
            $table->string('branch_address')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parties', function (Blueprint $table) {
            // Schema::table('parties', function (Blueprint $table) {
            $table->string('branch_address')->nullable(false)->unique()->change(); // Revert back to unique and not nullable
        
        });
    }
};
