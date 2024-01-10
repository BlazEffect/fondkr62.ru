<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('regulatory_base_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regulatory_base_id');
            $table->string('name');
            $table->string('path');

            $table->foreign('regulatory_base_id')->on('regulatory_base')->references('id')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regulatory_base_files');
    }
};
