@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-4">Editar Evento</h3>
        </div>
        <div class="col-12">
            <form action="{{route('update', $evento->id)}}" method="POST">
                @method('PUT')
                @include('agenda.form')
                <button type="submit" class="btn btn-primary mt-3 float-right">Atualizar</button>
            </form>
        </div>  
    </div>  
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        $('#data_inicio').datetimepicker({
            format: 'Y-MM-DD HH:mm:ss',
            defaultDate: "{{  $evento->data_inicio }}",
        });
        $('#data_prazo').datetimepicker({
            format: 'Y-MM-DD HH:mm:ss',
            defaultDate: "{{  $evento->data_prazo }}",
        });
        $('#data_conclusao').datetimepicker({
            format: 'Y-MM-DD HH:mm:ss',
            defaultDate: "{{  $evento->data_conclusao }}",
        });
    });
</script>
@endsection