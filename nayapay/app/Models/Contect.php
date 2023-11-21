<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contect extends Model
{
    use HasFactory;


    protected $fillable = [
        'subject',
        'user_id',
       
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
