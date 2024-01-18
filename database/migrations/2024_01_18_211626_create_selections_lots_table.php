<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('selections_lots', function (Blueprint $table) {
            $table->string('Oid', 30);
            $table->string('IdSelection', 30);
            $table->integer('IdLot');
            $table->string('TypeWork', 150);
            $table->string('Winner', 200)->nullable();
            $table->string('WinnerSecond', 200)->nullable();
            $table->string('StatusSelection', 100)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('selections_lots');
    }
};
