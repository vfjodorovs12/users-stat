<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('corporation_pilots', function (Blueprint $table) {
            $table->bigInteger('character_id')->primary();
            $table->string('character_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('corporation_pilots');
    }
};
