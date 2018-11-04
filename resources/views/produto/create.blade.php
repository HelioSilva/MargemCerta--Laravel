@extends('templates.geral')

@section('title','Novo')


@section('site')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Novo Produto</h1>

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

            <form action="{{ route('produtos.store') }}" method="post" autocomplete="off">
                {!! csrf_field() !!}
                @include('produto.formProduto') 
               <button type="submit" class="btn btn-primary">Inserir</button>
            </form>
            
        </div>
    </div>

@endsection

@section('script')
    $(document).ready(function () { 
            var $seuCampoCpf = $("#valores");
            $seuCampoCpf.mask('000.000.000-00', {reverse: true});
        });
@endsection

