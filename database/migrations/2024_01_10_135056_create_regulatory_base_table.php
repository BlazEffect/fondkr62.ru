<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('regulatory_base', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('section_id');
            $table->text('content')->nullable();
            $table->timestamps();

            $table->foreign('section_id')->on('regulatory_base_sections')->references('id')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regulatory_base');
    }
};
