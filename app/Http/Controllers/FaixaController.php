<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faixa;

class FaixaController extends Controller
{


    public function index()
    {
        $faixas = Faixa::all();
        
        return response()->json($faixas);
    }

    public function getFaixasByDiscoId($disco_id)
    {
        $faixas = Faixa::where('disco_id', $disco_id)->get();

        if ($faixas->isEmpty()) {
            return response()->json([
                'message' => 'Nenhuma faixa encontrada.',
            ], 404);
        }

        return response()->json($faixas);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'disco_id' => 'required|exists:discos,id'
        ]);

        $faixa = Faixa::create($validatedData);

        return response()->json($faixa, 201);
    }

 
    public function destroy($id)
    {
        $faixa = Faixa::find($id);

        if (!$faixa) {
            return response()->json(['message' => 'Faixa not found'], 404);
        }

        $faixa->delete();

        return response()->json(['message' => 'Faixa deleted successfully']);
    }

    public function searchByName($name)
    {

        $faixas = Faixa::where('name', 'like', '%' . $name . '%')->get();

        return response()->json($faixas);
    }
}
