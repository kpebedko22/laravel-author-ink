<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('book_genre', function (Blueprint $table) {
            $table->foreignId('book_id')
                ->references('id')
                ->on('books')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('genre_id')
                ->references('id')
                ->on('genres')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger('order');
        });
    }

    public function down()
    {
        Schema::table('book_genre', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);
            $table->dropForeign(['book_id']);
        });
        Schema::dropIfExists('book_genre');
    }
};
