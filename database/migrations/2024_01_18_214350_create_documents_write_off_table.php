<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documents_write_off', function (Blueprint $table) {
            $table->string('Id', 30)->nullable();
            $table->string('IdContract', 30);
            $table->timestamp('Date', 0);
            $table->integer('Sum')->nullable();
            $table->string('CodeHouse');
            $table->string('NameElementHouse', 200);
            $table->boolean('Conducted')->nullable();
            $table->string('CodeTypeWork', 10);
            $table->timestamp('DateWriteOff', 0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents_write_off');
    }
};
