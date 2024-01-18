<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contracts_elements_house', function (Blueprint $table) {
            $table->string('IdContract', 30)->nullable();
            $table->string('OidElementHouse', 30)->nullable();
            $table->integer('Sum');
            $table->timestamp('DateStart', 0);
            $table->timestamp('DateEnd', 0);
            $table->timestamp('TermPayment', 0);
            $table->string('LinkLot', 100)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts_elements_house');
    }
};
