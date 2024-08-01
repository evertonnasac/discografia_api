<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faixa;

class FaixaController extends Controller
{
    public function getFaixasByDiscoId($disco_id)
    {
        $faixas = Faixa::where('disco_id', $disco_id)->get();
        return response()->json($faixas);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer|min:0',
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

    public function searchByName(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $faixas = Faixa::where('name', 'like', '%' . $validatedData['name'] . '%')->get();

        return response()->json($faixas);
    }
}
