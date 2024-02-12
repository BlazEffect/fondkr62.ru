<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->string('Oid', 30)->unique();
            $table->string('IdSelection', 30);
            $table->integer('Id');
            $table->decimal('StartSum')->nullable();
            $table->decimal('WinnerSum')->nullable();
            $table->decimal('WinnerSecondSum')->nullable();
            $table->string('TypeWork', 100);
            $table->string('Link', 200);
            $table->string('ResultSelectionByLot', 200)->nullable();

            $table->foreign('IdSelection')->references('Id')->on('selections');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lots');
    }
};
