@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card border-info h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="m-0">Visualizar Evento</h5>
                </div>
                <div class="card-body text-info">
                    <h6 class="card-title">Acessar todos compromissos agendados.</h6>
                    <p class="card-text">Todos os Usuários</p>
                </div>
                <div class="card-footer bg-transparent border-info p-1">
                    <a href="{{route('agenda')}}" class="btn btn-outline-info btn-sm float-right">
                        Acessar Agenda
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-info h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="m-0">Adicionar Evento</h5>
                </div>
                <div class="card-body text-info">
                    <h6 class="card-title">Adicionar um novo Compromisso</h6>
                </div>
                <div class="card-footer bg-transparent border-info p-1">
                    <a href="{{route('create')}}" class="btn btn-outline-info btn-sm float-right">
                        Adicionar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
