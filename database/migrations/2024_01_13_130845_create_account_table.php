<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('account', function (Blueprint $table) {
            $table->string('Ls');
            $table->decimal('Saldo');
            $table->decimal('LastPay');
            $table->decimal('Debet76');
            $table->decimal('Credit76');
            $table->decimal('PeniDebet');
            $table->decimal('PeniCredit');
            $table->timestamp('Date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
