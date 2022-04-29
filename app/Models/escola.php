<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class escola extends Model
{
    use HasFactory;
    protected $table='escola';
    protected $fillable=[
        'nome_escola',
        'rede'
    ];
}
