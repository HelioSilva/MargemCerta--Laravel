
@extends('templates.geral')

@section('title','Todos Produtos')


@section('site')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Listagem de Produtos</h1>
            @if ($message = Session::get('success'))
                <div id="sucesso" class="alert alert-success collapse">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong id="message">{{$message}}</strong>
                </div>
            @endif

            <hr>
            <div class="pull-right">
                <a class="btn btn-sm btn-success" href="{{ route('produtos.create') }}">Novo Produto</a>
            </div>       

            <script>
             function exibir(){
                    $('#sucesso').show('fade');	
                                        setTimeout(function(){
                                            $('#sucesso').hide('fade');
                                        },2000);
                }
            </script>

            @if ($message = Session::get('success'))
                @php
                 echo "<script>exibir();</script>";
                @endphp
                <!-- <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div> -->
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Barras</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Custo</th>
                    <th scope="col">Vendas</th>
                    <th scope="col">Margem Bruta</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <th scope="row">{{$produto->id}}</th>
                        <td>{{$produto->barras}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->custo}}</td>
                        <td>{{$produto->preco}}</td>
                        <td>{{$produto->margem}}</td>
                        <td>
                            <a href="/produtos/{{$produto->id}}" class="btn btn-xs btn-info">Exibir</a>
                            <a href="/produtos/{{$produto->id}}/edit" class="btn btn-xs btn-primary">Editar</a>
                            <form style="display: inline" action="{{ url('/produtos', ['id' => $produto->id]) }}" method="post">
                                {!! method_field('delete') !!}
                                {!! csrf_field() !!}
                                <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                            </form>
                           
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            
        </div>
    </div>

@endsection

@section('script')

@endsection


