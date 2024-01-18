<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('elements_house', function (Blueprint $table) {
            $table->string('Oid', 30);
            $table->string('CodeHouse');
            $table->string('Name', 200);
            $table->string('TypeRepairs', 100)->nullable();
            $table->string('Period', 100)->nullable();
            $table->string('TermRealization', 100)->nullable();
            $table->integer('YearWorks')->default(0);
            $table->string('Update', 300)->nullable();
            $table->text('NoteForSite')->nullable();
            $table->integer('CodeWork1C')->nullable();
            $table->integer('CodeWorkOtchetKR')->nullable();
            $table->integer('CodeConstructiveEl')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('elements_house');
    }
};
