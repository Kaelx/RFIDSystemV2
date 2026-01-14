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
        Schema::create('rfid_scans', function (Blueprint $table) {
            $table->id();
            // Polymorphic relation: recordable_id, recordable_type
            $table->unsignedBigInteger('recordable_id');
            $table->string('recordable_type');
            $table->datetime('scanned_at');
            $table->timestamps();
            // Optionally, you can add an index for the morph columns
            $table->index(['recordable_id', 'recordable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfid_scans');
    }
};
