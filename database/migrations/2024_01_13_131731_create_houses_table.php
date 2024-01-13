<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->string('CodeHouse');
            $table->unsignedBigInteger('IdStreet')->nullable();
            $table->string('Region')->nullable();
            $table->string('location')->nullable();
            $table->string('Settlement')->nullable();
            $table->string('OfficialAddress')->nullable();
            $table->string('TypeFormationFund')->nullable();
            $table->unsignedBigInteger('NumberHouse');
            $table->string('Litera')->nullable();
            $table->string('KorpType', 50)->nullable();
            $table->string('NumKorp')->nullable();
            $table->integer('YearStartExploitation');
            $table->double('Area')->default(0);
            $table->string('RegionalProgram')->nullable();
            $table->string('Order965')->nullable();
            $table->timestamp('CreatedDate', 0);
            $table->string('Samoob', 10);
            $table->timestamp('Actualization', 0);
            $table->timestamp('Start', 0);
            $table->string('FullAddress');
            $table->string('Fias', 50);
            $table->string('Index', 6);
            $table->string('Da', 5);
            $table->string('Okrug', 20);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
