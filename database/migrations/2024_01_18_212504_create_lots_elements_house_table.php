<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lots_elements_house', function (Blueprint $table) {
            $table->string('OidLot', 30);
            $table->string('IdSelection', 30);
            $table->integer('IdLot');
            $table->string('Link', 200);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lots_elements_house');
    }
};
