@extends('layouts.app')

@section('title')
    <h1>Detalhes Movimentos Financeiro</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/movimentos-financeiros') }}">Listagem Movimentos Financeiros</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{ url('/movimentos-financeiros/' . $movimentosfinanceiro->id) }}">Detalhes Movimentos Financeiros</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Movimentos Financeiros {{ $movimentosfinanceiro->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/movimentos-financeiros') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>

                        <form method="POST" action="{{ url('movimentosfinanceiros' . '/' . $movimentosfinanceiro->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Apagar Movimentos Financeiros" onclick="return confirm(&quot;Tem certeza que deseja apagar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Apagar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $movimentosfinanceiro->id }}</td>
                                    </tr>
                                    <tr><th> Descricao </th><td> {{ $movimentosfinanceiro->descricao }} </td></tr><tr><th> Valor </th><td>R$ {{ numero_iso_para_br($movimentosfinanceiro->valor) }} </td></tr><tr><th> Data </th><td> {{ data_iso_para_br($movimentosfinanceiro->created_at) }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
