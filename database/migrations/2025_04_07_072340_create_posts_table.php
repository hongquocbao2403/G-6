<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');         // Tiêu đề bài viết
            $table->text('content');         // Nội dung bài viết
            $table->timestamps();            // Ngày tạo và ngày cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

