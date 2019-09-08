@extends('layouts.app')
@section('content')
<div class="mx-5">
    <div class="card">
        <div class="card-header d-flex py-1">
            <span>Agenda</span>
            <a href="{{ route('create') }}" class="ml-auto btn btn-sm btn-success">Novo</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>Visualizar</th>
                            <th>Responsável</th>
                            <th>Status</th>
                            <th>Titulo</th>
                            <th>Descrição</th>
                            <th>Inicio</th>
                            <th>Prazo</th>
                            <th>Conclusão</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventos as $evento)
                        <tr class="evento-{{ $evento->id }}">
                            <td>
                                <a class="btn btn-sm" href="{{ route('edit', $evento->id) }}" title="Editar">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <a class="text-danger btn btn-sm" href="{{ route('edit', $evento->id) }}" title="Deletar">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td class="responsavel-{{ $evento->name }}">{{ $evento->name }}</td>
                            <td>
                                <div class="badge badge-{{ ( $evento->status == 'encerrado') ? 'danger' : 'success' }}"> 
                                    {{ $evento->status }}
                                </div>
                            </td>
                            <td>{{ $evento->titulo }}</td>
                            <td>{{ $evento->descricao }}</td>
                            <td>{{ $evento->data_inicio }}</td>
                            <td>{{ $evento->data_prazo }}</td>
                            <td>{{ $evento->data_conclusao }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection