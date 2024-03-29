<?php

namespace database\migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')
                ->constrained('authors')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('name');
            $table->year('year');
            $table->string('genre');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropConstrainedForeignId('author_id');
        });

        Schema::dropIfExists('books');
    }
};
