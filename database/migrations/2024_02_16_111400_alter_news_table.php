<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('slug')->nullable()->change();
            $table->string('url')->nullable();
            $table->text('content')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('slug')->change();
            $table->dropColumn('url');
            $table->text('content')->change();
        });
    }
};
