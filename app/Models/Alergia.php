<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alergia extends Model
{
    use HasFactory;
    protected $table='alergia';
    protected $fillable=[
        'tipo_alergia',
        'nome_alergia'
    ];
}
