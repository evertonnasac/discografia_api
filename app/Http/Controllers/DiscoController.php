<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disco;
use App\Models\Faixa;



class DiscoController extends Controller
{
    public function index()
    {

        $discos = Disco::all();
        return response()->json($discos);
    }

    public function show($id)
    {
        $disco = Disco::find($id);
        if ($disco) {
            return response()->json($disco);
        } else {
            return response()->json(['message' => 'Disco não encontrado'], 404);
        }
    }

    public function searchByName($name)
    {
        // Use o Eloquent para buscar discos pelo nome
        $discos = Disco::where('name', 'like', "%{$name}%")->get();

        // Verifica se encontrou algum disco
        if ($discos->isEmpty()) {
            return response()->json([
                'message' => 'Nenhum disco encontrado com esse nome.',
            ], 404);
        }

        // Retorna os discos encontrados
        return response()->json($discos, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $disco = Disco::create($validatedData);
        return response()->json($disco, 201);
    }

    public function update(Request $request, $id)
    {
        $disco = Disco::find($id);
        if ($disco) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $disco->update($validatedData);
            return response()->json($disco);
        } else {
            return response()->json(['message' => 'Disco não encontrado'], 404);
        }
    }

    public function destroy($id)
    {
        $disco = Disco::find($id);
        if ($disco) {
            $disco->delete();
            return response()->json(['message' => 'Disco deletado com sucesso']);
        } else {
            return response()->json(['message' => 'Disco não encontrado'], 404);
        }
    }

    public function addTrackToDisco(Request $request, $discoId)
    {
        // Valida os dados da requisição
        $validatedData = $request->validate([
            'track_id' => 'required|exists:tracks,id',
        ]);

        // Verifica se o disco existe
        $disco = Disco::findOrFail($discoId);

        // Encontra a faixa pelo ID
        $track = Faixa::findOrFail($validatedData['track_id']);

        // Atribui a faixa ao disco
        $disco->tracks()->save($track);

        // Retorna uma resposta de sucesso
        return response()->json([
            'message' => 'Faixa atribuída ao disco com sucesso.',
            'disco' => $disco->load('tracks'), // Carrega as faixas associadas
        ], 200);
    }
}
