<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->text('content');
            $table->boolean('active')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('news_sections')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
};
