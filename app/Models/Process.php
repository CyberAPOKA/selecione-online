<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'group',
        'initial_date',
        'final_date',
        'result_date'
    ];

    public function relations()
    {
        return $this->hasMany(Relation::class);
    }
}
