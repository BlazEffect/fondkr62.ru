<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('selections', function (Blueprint $table) {
            $table->string('Oid', 30);
            $table->string('Id', 30);
            $table->timestamp('DatePublic', 0);
            $table->timestamp('DateOpening', 0);
            $table->timestamp('DateEnd', 0);
            $table->boolean('OnlyContractor')->nullable();
            $table->string('Url', 30)->nullable();
            $table->integer('StartSum');
            $table->integer('FinalSum');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('selections');
    }
};
