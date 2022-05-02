<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aluno;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use DataTables;

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
        $escolacases = Aluno::all();
        return view('aluno.index', compact('alunocases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('aluno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);



        $validatedData = $request->validate([
            'nome_aluno' => 'required',
            'data_nascimento' => 'required',
            'rg_aluno'=> 'required',
            'nome_mae',
            'email',
            'sexo',
            'tipo_saguinio',
            'estado_civil',
            'portador_pne',
            'medicacao_controlada',
            'possui_bolsa_familia',
            'renda_familiar',
            'numero_residencia',
            'viacep_id',
            'escolaridade_id'
        ]);

        try {

            $show = Aluno::create($validatedData);
            return redirect('/Aluno/create')->with('success', 'Aluno adicionado com sucesso!');
        } catch (QueryException $e) {
            $msg = "Esta aluno já está cadastrado. Por favor, informe uma aluno ainda não cadastrado!";
            return Redirect::back()->withErrors($msg);
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
        try {
            $AlunoCase = Aluno::findOrFail($id);
            return view('aluno.edit', compact('AlunoCase'));
        } catch (QueryException $e) {
            $msg = "Desculpe, ocorreu um problema interno. Por favor, contacte o administrador do sistema!";
            return Redirect::back()->withErrors($msg);
        }
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
        //dd($id);
        try {
            $validatedData = $request->validate([
                'nome_aluno' => 'required',
                'data_nascimento' => 'required',
                'rg_aluno'=> 'required',
                'nome_mae',
                'email',
                'sexo',
                'tipo_saguinio',
                'estado_civil',
                'portador_pne',
                'medicacao_controlada',
                'possui_bolsa_familia',
                'renda_familiar',
                'numero_residencia',
                'viacep_id',
                'escolaridade_id'
            ]);

            //dd($validatedData);
            Aluno::where('id', $id)->update($validatedData);
            return redirect('/aluno')->with('success', 'Dados do aluno atualizado com sucesso!');
        } catch (QueryException $e) {
            //$msg = ($e->getMessage());
            $msg = "Desculpe, ocorreu um problema interno. Por favor, se o erro persistir contacte o administrador do sistema!";
            return Redirect::back()->withErrors($msg);
        }
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
        $aluno = Aluno::findOrFail($id);
        try {
            $aluno->delete();
            return redirect('/aluno')->with('success', 'Aluno removido com sucesso!');
        } catch (QueryException $e) {
            //$msg = ($e->getMessage());
            $msg = "Esse aluno não pode ser deletado";
            return Redirect::back()->withErrors($msg);
        }
    }
}
