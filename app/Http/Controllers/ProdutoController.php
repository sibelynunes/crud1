<?php

namespace App\Http\Controllers;


use App\Http\Requests\storeUpdateSupport;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public readonly Produto $produtos;

    public function __construct()
    {
        $this->produto =  new Produto();
    }

    public function index()
    {
        $produtos =  $this->produto->all();

        return view('produtos', ['produtos'=>$produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produto_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeUpdateSupport $request)
    {
        $created = $this->produto->create([
            'name' => $request->input('name'),
            'quantidade' => $request->input('quantidade'),
            'valor' => password_hash($request->input('valor'), PASSWORD_DEFAULT)
        ]);
        
        if($created) {
            return redirect()->route('users.index')->with('message', 'successfuly created');
        }
        return redirect()->back()->with('Erro created');
    }

    /**
     * Display the specified resource.
     */
    public function show(produto $produto)
    {
       return view('produto_show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produto $produtos)
    {
        return view('produto_edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupport $request, string $id)
    {
      $update = $this->user->where('id', $id)->update($request->except(['_token', '_method']));
    
        if($update){
            return redirect()->route('users.index')->with('message', 'successfuly update');
        }
        return redirect()->back()->with('Erro update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->produto->where('id', $id)->delete();

        return redirect()-> route('produtos.index');
    }
}
