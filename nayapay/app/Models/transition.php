<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transition extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'type',
        'user_id',
        'sender',
        'status',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
