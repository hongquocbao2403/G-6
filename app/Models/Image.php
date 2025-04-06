<?php

namespace App\Models;
use App\Models\Style;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name',
        'file_path',
        'style_id', // thêm style_id nếu đang dùng
    ];
    public function style()
    {
        return $this->belongsTo(Style::class);
    }
}
