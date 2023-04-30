<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:255',
            'email' => 'required | string |email | max:255 | unique:users',
            'password' => 'required | string | min:8 | max:255 |confirmed',
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password)
        ]);
        $token = $user->createToken('registerToken')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
            'message'=> 'You have successfully registered',
        ],201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | string |email | max:255',
            'password' => 'required | string | min:8 | max:255',
        ]);
        //check the user email and password
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['Invalid email or password'],401);
        }
        $token = $user->createToken('loginToken')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
            'message'=> 'You have successfully logged in',
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response([
            'message' => "User logged out successfully"
        ],201);
    }
}
