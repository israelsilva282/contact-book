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
    public function store(Request $request)
    {
        //     $contato = Contato::create($request->validated());

        //     if ($contato) {
        //         return $this->response('Contato adicionado com sucesso', 200, $contato);
        //     }

        //     return $this->error('Contato não foi adicionado', 400, $contato->errors());

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'first_name' => 'required|max:20',
            'last_name' => 'nullable',
            'phone_number' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error('Data Invalid', 422, $validator->errors());
        }

        $created = Contato::create($validator->validated());

        if (!$created) {
            return $this->error('Something Wrong', 400);
        }

        return $this->response('Contato criado', 200, $created);
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
