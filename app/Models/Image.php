<?php

namespace App\Models;
use App\Models\Style;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name', 'path', // tùy theo cột trong bảng của bạn
    ];
}
