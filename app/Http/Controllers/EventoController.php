<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\EventoRequest;
use App\Eventos;
use App\User;
use DateTime;
use Auth;
use Redirect;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $eventos = Eventos::join('users', 'users.id', '=', 'eventos.responsavel')
                        ->select('eventos.*', 'users.name')
                        ->where('eventos.responsavel', Auth::user()->id )
                        ->get();
        return view('agenda.index', compact('eventos'));
    }

    /**
     * Search events in db from two dates
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        /* Find eventos entre datas selecionadas */
        $eventos = Eventos::join('users', 'users.id', '=', 'eventos.responsavel')
            ->select('eventos.*', 'users.name')
            ->where('eventos.responsavel', Auth::user()->id )
            ->whereBetween('data_inicio',[ $request['data_inicio'], $request['data_prazo'] ])
            ->WhereBetween('data_prazo', [ $request['data_inicio'], $request['data_prazo'] ])
            ->get();

        return view('agenda.search', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
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

        /* Find eventos entre datas selecionadas */
        $ee = Eventos::join('users', 'users.id', '=', 'eventos.responsavel')
                ->select('eventos.*', 'users.name')
                ->where('eventos.responsavel', Auth::user()->id )
                ->whereBetween('data_inicio',[$request['data_inicio'],$request['data_prazo']])
                ->orWhereBetween('data_prazo',[$request['data_inicio'],$request['data_prazo']])
                ->first();

        /* Find eventos que engloebem as datas selecionadas */
        $eg = Eventos::join('users', 'users.id', '=', 'eventos.responsavel')
                        ->select('eventos.*', 'users.name')
                        ->where('eventos.responsavel', Auth::user()->id )
                        ->where('data_inicio', '<', $request['data_inicio'])
                        ->where('data_prazo', '>', $request['data_prazo'])
                        ->first();

        /* Retorna ao usuário mensagem de erro ou retorna para agenda caso sucesso */
        if($ee || $eg){
            return Redirect::back()->withErrors(['As datas selecionadas coincidem com eventos já cadastrados no sistema']);
        } else{
            Eventos::create($request->all());
            return redirect('agenda');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
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
    public function update(EventoRequest $request, $id){
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
