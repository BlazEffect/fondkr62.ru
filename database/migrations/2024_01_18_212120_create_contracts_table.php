<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->string('Id', 30);
            $table->string('NameLot', 100)->nullable();
            $table->string('Link', 200);
            $table->string('OidContractor', 30)->nullable();
            $table->string('NameContractor', 200)->nullable();
            $table->timestamp('DateSigningContract', 0);
            $table->timestamp('PeriodExecutionContract', 0);
            $table->string('StatusContract', 200)->nullable();
            $table->string('Oid', 20)->nullable();
            $table->string('Guarantee', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
