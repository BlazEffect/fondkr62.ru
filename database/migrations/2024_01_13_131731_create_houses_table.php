<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->integer('CodeHouse')->primary();
            $table->integer('IdStreet')->nullable();
            $table->string('Region')->nullable();
            $table->string('location')->nullable();
            $table->string('Settlement')->nullable();
            $table->string('OfficialAddress')->nullable();
            $table->string('TypeFormationFund')->nullable();
            $table->integer('NumberHouse')->nullable();
            $table->string('Litera')->nullable();
            $table->string('KorpType', 50)->nullable();
            $table->string('NumKorp')->nullable();
            $table->integer('YearStartExploitation')->nullable();
            $table->double('Area')->default(0)->nullable();
            $table->string('RegionalProgram')->nullable();
            $table->string('Order965')->nullable();
            $table->timestamp('CreatedDate', 0)->nullable();
            $table->string('Samoob', 10)->nullable();
            $table->timestamp('Actualization')->nullable();
            $table->timestamp('Start')->nullable();
            $table->string('FullAddress')->nullable();
            $table->char('Fias', 50)->nullable();
            $table->char('Index', 6)->nullable();
            $table->char('Da', 5)->nullable();
            $table->char('Okrug', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
