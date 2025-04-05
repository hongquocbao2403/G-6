<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('styles', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Cột 'name' để lưu tên phong cách
            $table->timestamps(); // Thêm thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('styles');
    }
};
