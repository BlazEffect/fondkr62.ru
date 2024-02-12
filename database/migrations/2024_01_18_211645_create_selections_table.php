<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('selections', function (Blueprint $table) {
            $table->string('Oid', 30)->unique();
            $table->string('Id', 30)->unique();
            $table->timestamp('DatePublic')->nullable();
            $table->timestamp('DateOpening');
            $table->timestamp('DateEnd')->nullable();
            $table->boolean('OnlyContractor')->nullable();
            $table->string('Url', 30)->nullable();
            $table->decimal('StartSum')->nullable();
            $table->decimal('FinalSum')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('selections');
    }
};
