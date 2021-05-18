<?php
namespace App\Http\Controllers;

use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

abstract class BaseController 
{
    protected $classe;

    public function index(Request $request) {        
        return $this->classe::paginate($request->per_page);
    }

    public function store(Request $request) 
    {
        return 
        response()
        ->json($this->classe::create($request->all()),201);
    }

    public function show(int $id) 
    {
        $serie = $this->classe::find($id);
        if(is_null($serie)) {
            return response()->json(['erro'=>'Recurso não encontrado'],404);
        }
        return response()->json($serie,200);
    }

    public function update(int $id, Request $request) 
    {
        $serie = $this->classe::find($id);
        if(is_null($serie)) {
            return response()->json(['erro'=>'Recurso não encontrado'],404);
        }
        $serie->fill($request->all());
        $serie->save();
        return response()->json($serie,200);
    }

    public function destroy(int $id)
    {
        $removidos = $this->classe::destroy($id);
        if($removidos === 0) {
            return response()->json(['erro'=>'Recurso não encontrado'],404);
        }
        return response()->json(null,200);
    }
}