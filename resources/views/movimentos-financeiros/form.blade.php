<div class="form-group row {{ $errors->has('descricao') ? 'has-error' : ''}}">
    <label for="descricao" class="col-form-label col-sm-2">{{ 'Descricao' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="descricao" type="text" id="descricao" value="{{ isset($movimentosfinanceiro->descricao) ? $movimentosfinanceiro->descricao : ''}}" required>
        {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('valor') ? 'has-error' : ''}}">
    <label for="valor" class="col-form-label col-sm-2">{{ 'Valor' }}</label>
    <div class="col-sm-10">
        <input class="form-control maney" name="valor" type="text" id="valor" value="{{ isset($movimentosfinanceiro->valor) ? $movimentosfinanceiro->valor : ''}}" >
        {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('data') ? 'has-error' : ''}}">
    <label for="date" class="col-form-label col-sm-2">{{ 'Data' }}</label>
    <div class="col-sm-10">
        <input class="form-control data" name="data" type="text" id="data" value="{{ isset($movimentosfinanceiro->data) ? $movimentosfinanceiro->data : ''}}" required>
        {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="col-form-label col-sm-2">{{ 'Tipo' }}</label>
    <div class="col-sm-10">
        <select name="tipo" class="form-control" id="tipo" required>
    @foreach (json_decode('{"entrada":"Entrada","saida":"Saida"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($movimentosfinanceiro->tipo) && $movimentosfinanceiro->tipo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('empresa_id') ? 'has-error' : ''}}">
    <label for="empresa_id" class="col-form-label col-sm-2">{{ 'Empresa Id' }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="empresa_id" type="number" id="empresa_id" value="{{ isset($movimentosfinanceiro->empresa_id) ? $movimentosfinanceiro->empresa_id : ''}}" required>
        {!! $errors->first('empresa_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Criar' }}">
</div>
