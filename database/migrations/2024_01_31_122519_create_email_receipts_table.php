<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('email_receipts', function (Blueprint $table) {
            $table->string('Ls', 16);
            $table->string('Email', 50);
            $table->string('From');
            $table->string('Adres');
            $table->string('Phone', 20);
            $table->string('AdresPom');
            $table->string('File', 16);
            $table->timestamp('Created');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_receipts');
    }
};
