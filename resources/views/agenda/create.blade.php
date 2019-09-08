@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-4">Adicionar Evento</h3>
    <form action="{{route('store')}}" method="post">
        {{ csrf_field() }}
        @include('agenda.form')
        <button type="submit" class="btn btn-primary mt-3 float-right">Salvar</button>
    </form>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        $('.datetimepicker-input').datetimepicker({
        });
    });
</script>
@endsection