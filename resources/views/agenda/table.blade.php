<div class="table-responsive">
    <table class="table table-sm table-striped text-center m-0">
        <thead>
            <tr class="bg-dark text-white">
                <th>Ação</th>
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
                    <a class="btn btn-sm btn-outline-info" href="{{ route('edit', $evento->id) }}" title="Editar">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-danger btnExcluir" data-toggle="modal" data-target="#modalExemplo" title="Deletar" evento="{{ $evento->id }}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
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