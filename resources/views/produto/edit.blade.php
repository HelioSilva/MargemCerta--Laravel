@extends('templates.geral')

@section('title','Novo')


@section('site')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edição Produto</h1>
            <div class="row">
                <div class="col-lg-12">
                <div class="pull-right">
                <a class="btn btn-sm btn-primary" href="{{ route('produtos.index') }}">Voltar</a>
                </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <hr>

            <form action="{{ url('/produtos', ['id' => $produto->id]) }}" method="post" >
            {!! method_field('put') !!}
            {!! csrf_field() !!}
               @include('produto.formProduto') 
               <button type="submit" class="btn btn-primary">Aplicar Alterações</button>
            </form>
            
        </div>
    </div>

@endsection

@section('script')
 
@endsection