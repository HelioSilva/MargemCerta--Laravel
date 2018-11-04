@extends('templates.geral')


@section('title','Core')

@section('site')

   <style>

        .side{
            display:flex;
            justify-content: center;
            flex-wrap:wrap;
        }
        .panel{
                margin: 5px;
                padding: 5px;
                border-radius: 6px;
                background-color: #ffffff;
                border: 1px solid #E0E0E0;
                transition: box-shadow .1s;
                width: 300px;
                height: 175px;
                min-height: 175px;
        }
        .panel > div {
            text-align: center;

        }
        .valores{
            display:flex;
            justify-content:space-between;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 16px;
            border: 1px solid #b6b6b6 ;
        }
        .titulo{
            background-color: #32986c; 
            color : #fff;
            font-size:16px;
        }
        .barras{
            font-size:10px;
            font-stretch: semi-condensed;
        }
    </style>
 

    <div class="row side">

    @foreach($produtos as $produto)
    <div class="panel">                

      <div class="titulo">{{$produto->nome}}</div>

      <div class="row" style="margin-top:5px;">
            <div class="col-sm-4" style="" >
                <img class="row" width=80px src="img/ean.png" alt="">
                <div class="row barras">{{$produto->barras}}</div>
            </div>
            <div class="col-sm-7" style="padding: 10px;">
                    <div class="row valores">
                        <div>Custo</div>
                        <div>Venda</div>
                        <div>Margem</div>
                    </div>
                    <div class="row valores">
                        <div>{{$produto->custo}}</div>
                        <div>{{$produto->preco}}</div>
                        <div>{{$produto->margem}} %</div>
                    </div>
            </div>
      </div> 
      <div class="row">
          Aqui vem o preço da concorrencia
      </div>
      <div class="row">
          <a href="#" style="btn btn-sm btn-info">Detalhes</a>
      </div>

    </div>  
    @endforeach          

    </div> 


@endsection