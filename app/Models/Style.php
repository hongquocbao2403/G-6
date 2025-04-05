<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;

    // Các trường trong bảng 'styles'
    protected $fillable = [
        'name',      // Tên của phong cách
        'description', // Mô tả về phong cách
        'image',     // Hình ảnh liên quan đến phong cách (nếu có)
    ];

    // Các mối quan hệ với các mô hình khác (nếu có)
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
