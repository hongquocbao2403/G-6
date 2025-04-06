<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('styles', function (Blueprint $table) {
            $table->string('image_path')->nullable();  // Thêm cột image_path
        });
    }

    public function down()
    {
        Schema::table('styles', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
};
