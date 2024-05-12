<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $admin = Admin::create($validated);
    }

    public function show()
    {
        $admin = Admin::all();
        return response()->json($admin);
    }

    public function delete($idAdmin)
    {
        $admin = Admin::find($idAdmin);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found.'], 404);
        }

        $admin->delete();
        return response()->json(['message' => 'Admin deleted successfully.']);
    }

    

}
