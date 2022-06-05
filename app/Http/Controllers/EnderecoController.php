<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Endereco;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use DataTables;

class EnderecoController extends Controller
{

    public function index()
    {
        //
    }

    public function storeJsonData(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'endereco.cep' => 'required|max:15',
                'endereco.logradouro' => 'required|max:45',
                'endereco.bairro' => 'required|max:45',
                'endereco.numero_casa' => 'required|max:7',
                'endereco.complemento' => 'max:200',
            ]);


            $show = Endereco::create($validatedData['endereco']);

            $validate = [
                'success' => 1,
                'message' => 'Endereço cadastrado com sucesso',
                'id' => $show['id'],

            ];

            echo json_encode($validate);

        } catch (\Exception $e) {

            $validate = [
                'success' => 0,
                'message' => "Não foi possível cadastrar esse endereco, por favor revise os dados inseridos e tente novamente",
                'error' => $e
            ];

            echo json_encode($validate);
        }
    }

    public function destroy($id)
    {
        //
        $endereco = Endereco::findOrFail($id);
        try {
            $endereco->delete();
            return redirect('/endereco')->with('success', 'endereco removido com sucesso!');
        } catch (QueryException $e) {
            //$msg = ($e->getMessage());
            $msg = "Existe aluno(s) cadastrado(s) nesta endereco. Atualize o registro do(s) aluno(s), antes.";
            return Redirect::back()->withErrors($msg);
        }
    }
}
