<?php

namespace App\Http\Controllers;

use App\Produto ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produto.index', compact('produtos') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'barras' => 'required|max:14',
            'nome'   => 'required'
        ]);

        $produto = new Produto ;
        $produto->barras = $request->barras ;
        $produto->nome = $request->nome ;
        $produto->custo = $request->custo ;
        $produto->preco = $request->preco ;
        $produto->margem = (($request->preco-$request->custo)/$request->preco)*100;

        $produto->save();

        // Produto::create($request->all());
        return redirect()->route('produtos.index')->with('success','Produto salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        return view('produto.show', compact('produto'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('produto.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'barras' => 'required|max:14',
            'nome'   => 'required'
        ]);

        $produto =  Produto::find($id) ;
        $produto->barras = $request->barras ;
        $produto->nome = $request->nome ;
        $produto->custo = $request->custo ;
        $produto->preco = $request->preco ;
        $produto->margem = (($request->preco-$request->custo)/$request->preco)*100;

        $produto->update();

        // Produto::create($request->all());
        return redirect()->route('produtos.index')->with('success','Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::find($id)->delete();
        return redirect()->route('produtos.index')->with('success','Produto deletado com sucesso');
    }
}
