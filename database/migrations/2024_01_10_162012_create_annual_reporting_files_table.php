<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('annual_reporting_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('annual_reporting_id');
            $table->string('name');
            $table->string('path');

            $table->foreign('annual_reporting_id')->on('annual_reporting')->references('id')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('annual_reporting_files');
    }
};
