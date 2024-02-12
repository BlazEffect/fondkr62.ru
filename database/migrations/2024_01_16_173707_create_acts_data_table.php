<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('acts_data', function (Blueprint $table) {
            $table->string('Oid', 20)->primary();
            $table->string('Link');
            $table->decimal('Volume');
            $table->integer('Measure');
            $table->char('IpFile', 20)->nullable();
            $table->string('IpData', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('acts_data');
    }
};
