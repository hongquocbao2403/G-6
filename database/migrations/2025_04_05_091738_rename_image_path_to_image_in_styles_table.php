<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('styles', function (Blueprint $table) {
        $table->renameColumn('image_path', 'image');
    });
}

public function down()
{
    Schema::table('styles', function (Blueprint $table) {
        $table->renameColumn('image', 'image_path');
    });
}
};
