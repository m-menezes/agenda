@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card border-dark h-100">
                <div class="card-header bg-dark text-white">
                    <h5 class="m-0">Visualizar Evento</h5>
                </div>
                <div class="card-body text-dark">
                    <h6 class="card-title">Acessar todos eventos agendados.</h6>
                </div>
                <div class="card-footer bg-transparent border-dark p-1">
                    <a href="{{route('agenda')}}" class="btn btn-outline-dark btn-sm float-right">
                        Acessar Agenda
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-dark h-100">
                <div class="card-header bg-dark text-white">
                    <h5 class="m-0">Adicionar Evento</h5>
                </div>
                <div class="card-body text-dark">
                    <h6 class="card-title">Adicionar um novo Evento</h6>
                </div>
                <div class="card-footer bg-transparent border-dark p-1">
                    <a href="{{route('create')}}" class="btn btn-outline-dark btn-sm float-right">
                        Adicionar
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <form action="{{ route('search') }}" method="POST">
                {{ csrf_field() }}
                <div class="card border-dark h-100 mt-4">
                    <div class="card-header bg-dark text-white">
                        <h5 class="m-0">Buscar Eventos</h5>
                    </div>
                    <div class="card-body text-dark">
                        <h6 class="card-title">Busca de eventos a partir de duas datas</h6>
                        <div class="form-row">
                            <div class="input-group date col-6" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" id="data_inicio" data-toggle="datetimepicker" data-target="#data_inicio" placeholder="Data de início" name="data_inicio" autocomplete="off" required/>
                                <div class="input-group-append" data-target="#data_inicio" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <div class="input-group date col-6" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" id="data_prazo" data-toggle="datetimepicker" data-target="#data_prazo" placeholder="Data de término"  name="data_prazo" autocomplete="off" required/>
                                <div class="input-group-append" data-target="#data_prazo" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-dark p-1">
                        <button type="submit" class="btn btn-outline-dark btn-sm float-right">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('.datetimepicker-input').datetimepicker({
        format: 'Y-MM-DD HH:mm:ss',
    });
</script>
@endsection
