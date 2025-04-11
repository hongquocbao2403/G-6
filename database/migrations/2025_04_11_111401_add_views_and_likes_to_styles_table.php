<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('styles', function (Blueprint $table) {
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('likes')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('styles', function (Blueprint $table) {
            $table->dropColumn(['views', 'likes']);
        });
    }
};

