@extends('layouts.app')
@section('content')
<div class="mx-5">
    <div class="card">
        <div class="card-header d-flex py-1">
            <span>Agenda</span>
            <a href="{{ route('create') }}" class="ml-auto btn btn-sm btn-success">Novo</a>
        </div>
        <div class="card-body p-0">
            @include('agenda.table')
        </div>
    </div>
</div>
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Confirme a exclusão</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <a class="btn btn-danger" id="btnConfirmar">Excluir</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('.btnExcluir').click(function(){
        var url =  "{{ route('destroy', '') }}" + "/" + $(this).attr('evento');
        $('#btnConfirmar').attr('href', url);
    });
</script>
@endsection