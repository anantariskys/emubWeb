<?php

namespace App\Http\Controllers;

use App\Models\Tautan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TautanController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'link' => 'required'
        ]); 
    
        $validated['idAdmin'] = Auth::id();
    
        $tautan = Tautan::create($validated);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'link' => 'required'
        ]); 

        $tautan = Tautan::findOrFail($id);

        if (Auth::user()->role === 'admin') {
            $tautan->nama = $validated['nama'];
            $tautan->link = $validated['link'];
            $tautan->save();
        } else {
            if ($tautan->idAdmin !== Auth::id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $tautan->nama = $validated['nama'];
            $tautan->link = $validated['link'];
            $tautan->save();
        }

        return response()->json($tautan);
    
    }

    public function delete($idTautan)
    {
        $tautan = Tautan::findOrFail($idTautan);

        if (Auth::user()->role === 'admin') {
            $tautan->delete();
            return response()->json(['message' => 'Tautan berhasil dihapus']);
        } else {
            if ($tautan->idAdmin !== Auth::id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
    
            $tautan->delete();
            return response()->json(['message' => 'Tautan berhasil dihapus']);
        }
    }

    public function show()
    {
        $tautan = Tautan::all();
        return response()->json($tautan);
    }
}
