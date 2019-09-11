@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-4">Adicionar Evento</h3>
        </div>
        <div class="col-12">
            <div class="alert alert-primary" role="alert">
                Caso a data de conclusão seja selecionada, o projeto será automaticamente concluido
            </div>
        </div>
        <div class="col-12">
            <form action="{{route('store')}}" method="POST">
                @include('agenda.form')
                <button type="submit" class="btn btn-primary mt-3 float-right">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        $('#data_inicio').datetimepicker({
            format: 'Y-MM-DD HH:mm:s',
            defaultDate: "{{ old('data_inicio') }}",
        });
        $('#data_prazo').datetimepicker({
            format: 'Y-MM-DD HH:mm:s',
            defaultDate: "{{ old('data_prazo') }}",
        });
        $('#data_conclusao').datetimepicker({
            format: 'Y-MM-DD HH:mm:s',
            defaultDate: "{{ old('data_conclusao') }}",
        });
    });
</script>
@endsection