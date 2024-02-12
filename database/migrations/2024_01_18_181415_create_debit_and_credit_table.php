<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('debit_and_credit', function (Blueprint $table) {
            $table->integer('CodeHouse')->nullable()->unique();
            $table->decimal('Debit')->nullable();
            $table->decimal('Credit')->nullable();

            $table->foreign('CodeHouse')->references('CodeHouse')->on('houses');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('debit_and_credit');
    }
};
