<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('offer', function (Blueprint $table) {
            $table->string('CodeHouse')->nullable();
            $table->string('Kel', 400)->nullable();
            $table->string('Limite', 1500)->nullable();
            $table->string('Date', 10)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offer');
    }
};
