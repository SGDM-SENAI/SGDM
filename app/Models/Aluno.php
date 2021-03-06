<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $table='aluno';
    protected $fillable = [
        'nome_aluno',
        'data_nascimento',
        'rg_aluno',
        'cpf_aluno',
        'nome_pai',
        'nome_mae',
        'email',
        'sexo',
        'tipo_sanguineo',
        'estado_civil',
        'manequim',
        'numero_calcado',
        'portador_pne',
        'descricao_pne',
        'medicacao_controlada',
        'numero_bolsa_familia',
        'numero_cnis',
        'renda_familiar',
        'obs',
        'nome_social',
        'turno_escolar',
        'endereco_id',
        'escola_id',
        'nivel_escolaridade',
        'serie_escolar'
    ];
}
