<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //FUNÇÃO PARA VALIDAÇÃO DAS INFORMAÇÕES
    public function validation(Request $request) {

        $regras = [
            'name' => 'required|max:50|min:5',
            'last_name' => 'required|max:50|min:5',
            'adress' => 'required|max:50|min:5',
        ];
        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);
    }

    public function index()
    {
        //VISUALIZAÇÃO DOS DADOS
        $data = Cliente::all()
        ->orderBy('nome')->get();

        return view('clientes.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //CRIAÇÃO DO OBJETO E PEGANDO O REQUEST QUE VIRÁ DO HTML
        $obj = new Cliente();
        $obj->name = mb_strtoupper($request->name, 'UTF-8');
        $obj->last_name = mb_strtolower($request->last_name, 'UTF-8');
        $obj->gender = $request->gender;
        $obj->adress = mb_strtolower($request->adress, 'UTF-8');
        $obj->date_birth = $request->date_birth;

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //PEGA O ID DO CLIENTE E EXCLUI
        $obj = Cliente::find($id);

        if (isset($obj)) {
            $obj->delete();
        } else {
            $msg = "Cliente";
            $link = "clientes.index";
            return view('erros.id', compact(['msg', 'link']));
        }

        return redirect()->route('clientes.index');
    }
}
