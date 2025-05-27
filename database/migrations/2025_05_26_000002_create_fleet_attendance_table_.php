<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fleet_attendance', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('character_id');
            $table->bigInteger('fleet_id');
            $table->timestamp('attended_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fleet_attendance');
    }
};
