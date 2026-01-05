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
        Schema::table('employees', function (Blueprint $table) {
            $table->foreignId('program_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->foreignId('department_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->foreignId('position_id')->nullable()->constrained('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropConstrainedForeignId('program_id');
            $table->dropConstrainedForeignId('department_id');
            $table->dropConstrainedForeignId('postion_id');
        });
    }
};
