<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('regulatory_base_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->on('regulatory_base_sections')->references('id')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regulatory_base_sections');
    }
};
