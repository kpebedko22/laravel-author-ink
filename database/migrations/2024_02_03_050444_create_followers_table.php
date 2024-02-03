<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('follower_id')
                ->constrained('authors')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('following_id')
                ->constrained('authors')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('followers', function (Blueprint $table) {
            $table->dropConstrainedForeignId('following_id');
            $table->dropConstrainedForeignId('follower_id');
        });

        Schema::dropIfExists('followers');
    }
};
