<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\EventoRequest;
use App\Eventos;
use App\User;
use DateTime;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Eventos::join('users', 'users.id', '=', 'eventos.responsavel')
                        ->select('eventos.*', 'users.name')
                        ->get();
        return view('agenda.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Usuarios = User::select('id', 'name')->get();
        return view('agenda.create', compact('Usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoRequest $request){
        $data_inicio = new DateTime($request['data_inicio']);
        $data_prazo = new DateTime($request['data_prazo']);
        $data_conclusao = new DateTime($request['data_conclusao']);
        $evento = [
            'titulo' => $request['titulo'],
            'descricao' => $request['descricao'],
            'status' => $request['status'],
            'responsavel' => $request['responsavel'],
            'data_inicio' => $data_inicio->format('Y-m-d H:i:s'),
            'data_prazo' => $data_prazo->format('Y-m-d H:i:s'),
            'data_conclusao' => $data_conclusao->format('Y-m-d H:i:s'),
        ];
        Eventos::create($evento);
        return redirect('agenda');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Eventos::find($id);
        $Usuarios = User::select('id', 'name')->get();
        return view('agenda.edit', compact('evento', 'Usuarios'));
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
        $evento = Eventos::find($id);
        $evento->fill($request->all());
        $evento->update();
        return redirect('agenda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Eventos::destroy($id);
        return redirect('agenda');
    }
}
