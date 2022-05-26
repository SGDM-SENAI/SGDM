<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
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
        'tipo_saguinio',
        'estado_civil',
        'manequim',
        'numero_calcado',
        'portador_pne',
        'descricao_pne',
        'medicacao_controlada',
        'nome_medicacao',
        'possui_bolsa_familia',
        'numero_bolsa_familia',
        'numero_cnis',
        'renda_familiar',
        'obs',
        'nome_social',
        'turno_escolar',
        'numero_residencia',
        'complemento',
        'viacep_id',
        'escola_id',
        'escolaridade_id'
    ];
}
