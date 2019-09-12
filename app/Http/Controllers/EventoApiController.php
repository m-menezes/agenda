<?php

namespace App\Http\Controllers;
use App\Eventos;
use App\User;
use DateTime;
use Auth;
use Illuminate\Http\Request;

class EventoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $eventos = Eventos::join('users', 'users.id', '=', 'eventos.responsavel')
        ->select('eventos.*', 'users.name')
        ->get();
        return response()->json($eventos);
    } 

     /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function users(){
        $Usuarios = User::select('id', 'name')->get();
        return response()->json($Usuarios);
    } 


    /**
     * Show description api.
     *
     * @return \Illuminate\Http\Response
     */
    public function help(){
        $api = [
            "list" => [
                "Method" => "GET",
                "url" => "http://localhost:8000/api/agenda",
            ],
			"store" => [
                "Method" => "POST",
                "url" => "http://localhost:8000/api/agenda/store",
				"Campos Obrigatórios" => [
                    "titulo" => "Evento titulo",
                    "data_inicio" => "2016-06-30 14:52:21",
                    "data_prazo" => "2016-07-30 14:52:21",
                    "responsavel" => 1,
                    "status" => "andamento||encerrado"
                ],
                "Campos Opcionais" => [
                    "descricao" => "breve descricao do evento,",
                    "data_conclusao" => "2016-07-30 14:52:21",
                ]
            ],
            "show" => [
                "Method" => "GET",
                "url" => "http://localhost:8000/api/agenda/1",
                "Campos Obrigatórios" => [
                    "id" => 1,
                ]
            ],
            "search" =>[
                "Method" => "GET",
                "URL" => "http://localhost:8000/api/agenda/search?data_inicio=1900/09/10&data_prazo=2020-09-10%2023:58:44&responsavel=1",
                "Campos Obrigatórios" => [
                    "data_inicio" => "2019/09/10",
                    "data_prazo" => "2020/09/10"
                ],
                "Campos Opcionais" => [
                    "responsavel" => "id"
                ],
                "Observação" => "Campo de datas podem possuir apenas ano e mês"
            ],
            "update" => [
                "Method" => "PUT",
                "url" => "http://localhost:8000/api/agenda/update/1",
                "Campos Obrigatórios" => [
                    "id" => 1,
                ],
                "Observação" => "Campos a serem editados são os mesmos do store, porem não é necessário enviar os campos que permanecerão inalterados."
            ],
            "delete" => [
                "Method" => "DELETE",
                "url" => "http://localhost:8000/api/agenda/1",
                "Campos Obrigatórios" => [
                    "id" => 1,
                ]
            ],
            "users" => [
                "Method" => "GET",
                "url" => "http://localhost:8000/api/users",
                "Observação" => "Retorna listagem de usuários com seu ID"
            ],
		];
        return response()->json($api);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $evento = new Eventos();
        $evento->fill($request->all());
        $evento->save();

        return response()->json($evento, 201);
    }

    /**
     * Search events in db from two dates
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        /* Replace caso usuario informe data com barra */
        $data_inicio = new DateTime(str_replace('/', '-', $_GET['data_inicio']));
        $data_prazo = new DateTime(str_replace('/', '-', $_GET['data_prazo']));

        /* Find eventos entre datas selecionadas */
        /* Verificacao se query possui responsavel */
        if(isset($_GET['responsavel'])){
            $eventos = Eventos::join('users', 'users.id', '=', 'eventos.responsavel')
            ->select('eventos.*', 'users.name')
            ->where('eventos.responsavel',  $_GET['responsavel'] )
            ->whereBetween('data_inicio',[ $data_inicio->format('Y-m-d H:i:s'), $data_prazo->format('Y-m-d H:i:s') ])
            ->WhereBetween('data_prazo', [ $data_inicio->format('Y-m-d H:i:s'), $data_prazo->format('Y-m-d H:i:s') ])
            ->get();
        } else{
            $eventos = Eventos::join('users', 'users.id', '=', 'eventos.responsavel')
            ->select('eventos.*', 'users.name')
            ->whereBetween('data_inicio',[ $data_inicio->format('Y-m-d H:i:s'), $data_prazo->format('Y-m-d H:i:s') ])
            ->WhereBetween('data_prazo', [ $data_inicio->format('Y-m-d H:i:s'), $data_prazo->format('Y-m-d H:i:s') ])
            ->get();
        }
        return response(json_encode($eventos))->header('Content-Type', 'application/json');
    }

    /**
     * Show specified event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Eventos::find($id);

        if(!$evento) {
            return response()->json([
                'erro'   => 'Evento não encontrado',
            ], 404);
        }

        return response()->json($evento);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $evento = Eventos::find($id);
        if(!$evento) {
            return response()->json([
                'erro'   => 'Evento não encontrado',
            ], 404);
        }
        $evento->fill($request->all());
        $evento->update();
        // $evento->save();
        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $evento = Eventos::find($id);

        if(!$evento) {
            return response()->json([
                'erro'   => 'Evento não encontrado',
            ], 404);
        }

        $evento->delete();
        return response()->json([
            'msg'   => 'Evento deletado',
        ]);
    }
}
