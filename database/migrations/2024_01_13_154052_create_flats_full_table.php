<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('flats_full', function (Blueprint $table) {
            $table->bigInteger('Lso')->primary();
            $table->string('Kv')->nullable();
            $table->string('Kom')->nullable();
            $table->double('Pl')->default(0)->nullable();
            $table->string('Category')->nullable();
            $table->string('Del', 10)->default('');
            $table->string('NotNach', 10)->default('');
            $table->string('Type')->nullable();
            $table->string('Otv')->nullable();
            $table->string('Sobs')->nullable();
            $table->string('Lsrkc')->nullable();
            $table->char('OidContragent', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flats_full');
    }
};
