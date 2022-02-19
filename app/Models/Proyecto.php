<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'pdf',
        'vm',
        'autor',
        'path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
