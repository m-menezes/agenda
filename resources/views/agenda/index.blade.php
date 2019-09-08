@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex py-1">
            <span>Agenda</span>
            <a href="#" class="ml-auto btn btn-sm btn-success">Novo</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>ID</th>
                            <th>Status</th>
                            <th>Titulo</th>
                            <th>Descrição</th>
                            <th>Inicio</th>
                            <th>Prazo</th>
                            <th>Conclusão</th>
                            <th>Responsável</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $evento->id }}</td>
                            <td>
                                <div class="badge {{ ( $evento->status == 'encerrado') ? 'badge-danger' : 'badge-success' }}"> 
                                    {{ $evento->status }}
                                </div>
                            </td>
                            <td>{{ $evento->titulo }}</td>
                            <td>{{ $evento->descricao }}</td>
                            <td>{{ $evento->data_inicio }}</td>
                            <td>{{ $evento->data_prazo }}</td>
                            <td>{{ $evento->data_conclusao }}</td>
                            <td>{{ $evento->responsavel }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection