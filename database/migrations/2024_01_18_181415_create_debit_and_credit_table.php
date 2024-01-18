<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('debit_and_credit', function (Blueprint $table) {
            $table->string('CodeHouse')->nullable();
            $table->integer('Debit')->nullable();
            $table->integer('Credit')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('debit_and_credit');
    }
};
