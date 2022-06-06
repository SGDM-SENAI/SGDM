<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Escola;
use App\Models\Alergia;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alunocases = Aluno::all();
        return view('aluno.index', compact('alunocases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escolaCases = Escola::all();
        $alergiaCases = Alergia::all();
        return view('aluno.create', compact('escolaCases', 'alergiaCases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        try {

            $validatedData = $request->validate([
                'aluno.nome_aluno' => 'required|max:64',
                'aluno.data_nascimento' => 'required',
                'aluno.rg_aluno' => 'required|max:15',
                'aluno.cpf_aluno' => 'max:15',
                'aluno.nome_mae' => 'required|max:64',
                'aluno.nome_pai' => 'max:64',
                'aluno.email' => 'required|max:255',
                'aluno.sexo' => 'required|max:1',
                'aluno.tipo_sanguineo' => 'required|max:12',
                'aluno.estado_civil' => 'required|max:32',
                'aluno.manequim' => 'max:12',
                'aluno.numero_calcado' => 'max:3',
                'aluno.portador_pne' => 'required|max:1',
                'aluno.descricao_pne' => 'max:128',
                'aluno.medicacao_controlada' => 'max:160',
                'aluno.numero_bolsa_familia' => 'max:15',
                'aluno.numero_cnis' => 'max:15',
                'aluno.renda_familiar' => 'required|max:10',
                'aluno.obs' => 'max:200',
                'aluno.nome_social' => 'max:15',
                'aluno.turno_escolar' => 'max:15',
                'aluno.nivel_escolaridade' => 'max:45',
                'aluno.serie_escolar' => 'max:10',
                'aluno.endereco_id' => 'required|max:20',
                'aluno.escola_id' => 'max:20',
            ]);


            $show = Aluno::create($validatedData['aluno']);

            $validate = [
                'success' => 1,
                'message' => 'aluno cadastrado com sucesso',
                // 'id' => $show['id'],

            ];

            echo json_encode($validate);
        } catch (\Exception $e) {

            $validate = [
                'success' => 0,
                'message' => "Não foi possível cadastrar esse aluno, por favor revise os dados inseridos e tente novamente",
                'error' => $e,
                'e' => $validatedData
            ];

            echo json_encode($validate);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
