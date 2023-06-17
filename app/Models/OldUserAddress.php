<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldUserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'state',
        'city',
        'zip_code',
        'address',
        'number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
