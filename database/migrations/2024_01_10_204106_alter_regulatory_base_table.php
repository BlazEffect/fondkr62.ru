<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('regulatory_base', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->dropColumn('section_id');

            $table->json('documents')->nullable();
            $table->string('section_name');
        });
    }

    public function down(): void
    {
        Schema::table('regulatory_base', function (Blueprint $table) {
            $table->text('content')->nullable();
            $table->unsignedBigInteger('section_id');

            $table->dropColumn('documents');
            $table->dropColumn('section_name');
        });
    }
};
