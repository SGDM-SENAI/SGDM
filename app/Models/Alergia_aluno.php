<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergia_aluno extends Model
{
    use HasFactory;
    protected $table='alergia_aluno';
    protected $fillable=[
        'alergia_id',
        'aluno_id'
    ];
}