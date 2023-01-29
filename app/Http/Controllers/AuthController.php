<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        return view("auth/login");
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials) == true) {
            $request->session()->regenerate();
 
            if (Auth::user()->access_type == "ADMIN") { // ke admin
                return redirect('admin/dashboard');
            }
            
            return redirect('/');
        } else {
            return redirect('login')->withError("Username/Password tidak sesuai!");
        }
    }

    public function register()
    {
        return view("auth/register");
    }
    
    public function doRegister(request $request)
    {
        $request->validate([
            "name"             => "required",
            "email"            => "required|unique:users",
            "password"         => "required|min:6",
            "reenter_password" => "required|same:password",
        ]);

        $data = $request->all();

        $data['password'] = bcrypt($data['password']);
        $data['level'] = "MEMBER";

        DB::table("users")->insert([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        
        return redirect("/")->withSuccess("Pendaftaran berhasil!");
    }

    public function doLogout()
    {
        Auth::logout();

        return redirect("login");
    }

}
