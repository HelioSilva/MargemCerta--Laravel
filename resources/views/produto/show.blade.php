@extends('templates.geral')

@section('title','Exibir')

@section('site')

<div class="col-md-8 col-md-offset-2">
<h1>Detalhes do produto</h1>
  <div class="row">
      <div class="col-lg-12">
          <div class="pull-right">
          <a class="btn btn-sm btn-primary" href="{{ route('produtos.index') }}">Voltar</a>
          </div>
      </div>
  </div>
   <hr>

  <div class="row">
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Codigo : </strong>
        {{ $produto->id }}
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Codigo Barras : </strong>
        {{ $produto->barras }}
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Nome  : </strong>
        {{ $produto->nome }}
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Preço Custo  : </strong>
        {{ $produto->custo }}
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Preço venda  : </strong>
        {{ $produto->preco }}
      </div>
    </div>

  </div>

  </div>
 

@endsection