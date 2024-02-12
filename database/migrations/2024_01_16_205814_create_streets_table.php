<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('streets', function (Blueprint $table) {
            $table->integer('Id')->primary();
            $table->integer('Pid');
            $table->string('Type', 36)->nullable();
            $table->string('Name', 72)->nullable();
            $table->string('DopNumber', 36)->nullable();
            $table->string('CodeKLADR', 36)->nullable();
            $table->string('Level', 8)->nullable();
            $table->string('CodeFIAS', 36)->nullable();
            $table->timestamp('CreatedDate', 0);
            $table->char('ParentFIAS', 36)->nullable();
            $table->char('TypeSmall', 16)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('streets');
    }
};
