@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-4">Editar Evento</h3>
    <form>
        {{ csrf_field() }}
        @include('agenda.form')
    </form>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        $('.datetimepicker-input').datetimepicker()
    });
</script>
@endsection