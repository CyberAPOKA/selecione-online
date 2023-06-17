<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldUserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'birth_date',
        'mothers_name',
        'cpf',
        'identification_document'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
