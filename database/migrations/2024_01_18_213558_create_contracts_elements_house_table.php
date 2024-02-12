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
            $table->decimal('Sum')->nullable();
            $table->timestamp('DateStart')->nullable();
            $table->timestamp('DateEnd')->nullable();
            $table->timestamp('TermPayment')->nullable();
            $table->string('LinkLot', 100)->nullable();

            $table->foreign('IdContract')->references('Id')->on('contracts');
            $table->foreign('OidElementHouse')->references('Oid')->on('elements_house');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts_elements_house');
    }
};
