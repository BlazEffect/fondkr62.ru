<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('corruptions', function (Blueprint $table) {
            $table->id();
            $table->string('F', 100);
            $table->string('I', 100);
            $table->string('O', 100);
            $table->string('Email', 100);
            $table->string('Adres', 255);
            $table->string('Theme', 255);
            $table->text('Message');
            $table->string('Sogl', 5);
            $table->timestamp('Created', 0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('corruptions');
    }
};
