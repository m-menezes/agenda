<div class="form-row">
    <div class="form-group col-6">
        <label for="inputTitulo">Titulo</label>
        <input type="text" class="form-control" id="inputTitulo" name="titulo" placeholder="Titulo">
    </div>
    <div class="form-group col-3">
        <label for="inputResponsavel">Responsável</label>
        <select class="form-control" id="inputResponsavel">
            @foreach ($Usuarios as $Usuario)
            <option value="{{ $Usuario->id }}">{{ $Usuario->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-3">
        <label for="inputStatus">Status</label>
        <select class="form-control" id="inputStatus">
            <option value="andamento">Em Andamento</option>
            <option value="Encerrado">Encerrado</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="inputTextArea">Descrição</label>
    <textarea class="form-control" id="inputTextArea" rows="5" name="descricao"></textarea>
</div>
<div class="form-row">
    <div class="input-group date col-4" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="data_inicio" data-toggle="datetimepicker" data-target="#data_inicio" placeholder="Data de início"/>
        <div class="input-group-append" data-target="#data_inicio" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
    <div class="input-group date col-4" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="data_prazo" data-toggle="datetimepicker" data-target="#data_prazo" placeholder="Data de término"/>
        <div class="input-group-append" data-target="#data_prazo" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
    <div class="input-group date col-4" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="data_conclusao" data-toggle="datetimepicker" data-target="#data_conclusao" placeholder="Data de conclusão"/>
        <div class="input-group-append" data-target="#data_conclusao" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary mt-3 float-right">Sign in</button>