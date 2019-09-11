{{ csrf_field() }}
<div class="form-row">
    <div class="form-group col-6">
        <label for="inputTitulo">Titulo</label>
        <input type="text" class="form-control" id="inputTitulo" name="titulo" placeholder="Titulo" required value="{{ old('titulo') ?? ( (isset($evento->titulo)) ? $evento->titulo : '' ) }}">
    </div>
    <div class="form-group col-3">
        <label for="inputResponsavel">Responsável</label>
        <select class="form-control" id="inputResponsavel" name="responsavel">
            @foreach ($Usuarios as $Usuario)
            <option value="{{ $Usuario->id }}" {{ ( ( old("responsavel") ==  $Usuario->id  || ( isset($evento->responsavel) && $evento->responsavel == $Usuario->id ) ) ? "selected":"" ) }}>{{ $Usuario->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-3">
        <label for="inputStatus">Status</label>
        <select class="form-control" id="inputStatus" name="status" required>
            <option value="andamento" {{ ( ( old("status") ==  'andamento' || ( isset($evento->status) && $evento->status == 'andamento' ) ) ? "selected":"" ) }}>Em Andamento</option>
            <option value="encerrado" {{ ( ( old("status") ==  'encerrado' || ( isset($evento->status) && $evento->status  == 'encerrado' ) ) ? "selected":"" ) }}>Encerrado</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="inputTextArea">Descrição</label>
<textarea class="form-control" id="inputTextArea" rows="5" name="descricao">{{ old('descricao') ?? ( (isset($evento->descricao)) ? $evento->descricao : '' ) }}</textarea>
</div>
<div class="form-row">
    <div class="input-group date col-4" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="data_inicio" data-toggle="datetimepicker" data-target="#data_inicio" placeholder="Data de início" name="data_inicio" autocomplete="off" required/>
        <div class="input-group-append" data-target="#data_inicio" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
    <div class="input-group date col-4" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="data_prazo" data-toggle="datetimepicker" data-target="#data_prazo" placeholder="Data de término"  name="data_prazo" autocomplete="off" required/>
        <div class="input-group-append" data-target="#data_prazo" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
    <div class="input-group date col-4" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="data_conclusao" data-toggle="datetimepicker" data-target="#data_conclusao" placeholder="Data de conclusão"  name="data_conclusao" autocomplete="off"/>
        <div class="input-group-append" data-target="#data_conclusao" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>