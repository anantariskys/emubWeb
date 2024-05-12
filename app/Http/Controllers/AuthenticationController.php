<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('username', $request->username)->first();
        
        if (! $admin || $admin->password !== $request->password) {
            throw ValidationException::withMessages([
                'username' => ['Kombinasi username dan password salah.'],
            ]);
        }

        return $admin->createToken('admin login')->plainTextToken;
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }

    public function siapa(Request $request)
    {
        $admin = Auth::user(); // Mengambil data pengguna yang sedang login
        return response()->json($admin);
    }
}
