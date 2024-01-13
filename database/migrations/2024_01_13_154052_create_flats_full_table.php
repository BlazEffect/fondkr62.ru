<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('flats_full', function (Blueprint $table) {
            $table->string('Lso');
            $table->string('Kv')->nullable();
            $table->string('Kom')->nullable();
            $table->float('Pl')->default(0);
            $table->string('Category')->nullable();
            $table->string('Del', 10)->default('');
            $table->string('NotNach', 10)->default('');
            $table->string('Type')->nullable();
            $table->string('Otv')->nullable();
            $table->string('Sobs')->nullable();
            $table->string('Lsrkc')->nullable();
            $table->string('OidContragent', 20);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flats_full');
    }
};
