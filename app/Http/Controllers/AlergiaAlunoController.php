<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alergia_aluno;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;

class AlergiaAlunoController extends Controller
{
    public function store(Request $request)
    {
        $historic = [];

        try {
            foreach ($request['alergias'] as $alergia_id) {

                $alergia = [
                    'alergia_id' => $alergia_id,
                    'aluno_id' => $request['aluno_id']
                ];

                $show = Alergia_aluno::create($alergia);

                array_push($historic, $show);
            }

            $validate = [
                'success' => 1,
                'message' => 'alergia cadastrada com sucesso',
            ];

            echo json_encode($validate);
        } catch (QueryException $e) {

            $validate = [
                'success' => 0,
                'message' => 'Não foi possível cadastrar esse telefone, por favor revise os dados inseridos e tente novamente',
                'error' => $e,
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
}
