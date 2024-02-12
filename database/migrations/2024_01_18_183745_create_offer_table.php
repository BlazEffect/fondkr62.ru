<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('offer', function (Blueprint $table) {
            $table->integer('CodeHouse')->nullable();
            $table->char('Kel', 400)->nullable();
            $table->char('Limite', 1500)->nullable();
            $table->char('Date', 10)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offer');
    }
};
