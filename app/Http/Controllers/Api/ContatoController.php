<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContatoRequest;
use App\Http\Requests\UpdateContatoRequest;
use App\Http\Resources\ContatoResource;
use App\Models\Contato;
use App\Traits\HttpResponses;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

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
        $created = Contato::create($request->validated());
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
        try {
            $contato = Contato::findOrFail($id);
            return new ContatoResource($contato);
        } catch (ModelNotFoundException $e) {
            return $this->error("Contato não encontrado", 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContatoRequest $request, string $id)
    {
        try {

            $validated = $request->validated();

            $contato = Contato::findOrFail($id);

            $updated = $contato->update([
                'user_id' => $validated['user_id'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'phone_number' => $validated['phone_number'],
                'email' => $validated['email'],
            ]);

            if ($updated) {
                return $this->response("Contato atualizado com sucesso", 200, new ContatoResource($contato->load('user')));
            }

            return $this->error('Contato não atualizado', 400);
        } catch (ModelNotFoundException) {
            return $this->error("Contato não encontrado", 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contato = Contato::where('id', $id)->first();

        $deleted = $contato->delete();

        if ($deleted) {
            return $this->response("Contato deletado", 200);
        }

        return $this->error('Contato não deletado', 400);
    }
}
