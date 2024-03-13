<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContatoRequest;
use App\Http\Resources\ContatoResource;
use App\Models\Contato;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class ContatoController extends Controller
{

    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContatoResource::collection(Contato::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateContatoRequest $request)
    {
        $contato = Contato::create($request->validated());

        if ($contato) {
            return $this->response('Contato adicionado com sucesso', 200, $contato);
        }

        return $this->error('Contato não foi adicionado', 400, $contato->errors());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ContatoResource(Contato::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
