<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'unique:users',
            'posisi' => 'min:2',
            'image' => 'min:2',
            'password' => 'min:2'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);


        User::create($validatedData);


        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }

    function form()
    {

        return view('login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'name' => 'required|min:4|max:100',
            'password' => 'required|min:4|max:8',
        ]);


        $user = User::where('name', $request->name)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect('/login')
                ->with('failed', 'Username or password is incorrect.');
        }


        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {

            $request->session()->regenerate();
            return redirect()->intended('/produk')->with('success', 'Login successful');
        }


        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
