<?php

// app/Models/Subscription.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'user_id'];

    /**
     * Mối quan hệ với model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

