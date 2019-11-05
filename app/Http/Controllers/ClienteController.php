<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('cliente')->with(['clientes'=>Cliente::all()]);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $input=$request->validated();
        $cliente=new Cliente($input);
        $cliente->ip=$request->ip();
        try {
            $result=$cliente->save();
        } catch(\Exception $e) {
            var_dump($e);
            exit;
            //return redirect(route('cliente.create'));
        }
    
        return redirect(route('cliente.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
         return view('show')->with(['cliente'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
         return view('edit')->with(['cliente'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {      
        $input=$request->validated();
         try{
            $result=$cliente->update($input);
        }catch(\Exception $e){
            $error=['nombre'=>'El nombre utilizado ya existe en otro producto.'];
            return redirect('cliente/'. $cliente->id . '/edit') ->withErrors($error) -> withInput();
        }
        return redirect(route('cliente.index'))->with(['result'=>$result,'op'=>'update']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
         try{
             $cliente->delete();
             $result=true;
        }catch(\Exception $e){
            $result=false;
        }
        return redirect(route('cliente.index'))->with(['result'=>$result ,'op'=>'destroy']);  
    }
}
