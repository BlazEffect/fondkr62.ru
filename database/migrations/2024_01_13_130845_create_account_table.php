<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('account', function (Blueprint $table) {
            $table->decimal('Ls')->nullable()->unique();
            $table->double('Saldo')->nullable();
            $table->double('LastPay')->nullable();
            $table->timestamp('Date')->nullable();
            $table->double('Debet76')->nullable();
            $table->double('Credit76')->nullable();
            $table->double('PeniDebet')->nullable();
            $table->double('PeniCredit')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
