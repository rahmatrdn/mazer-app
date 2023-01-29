<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public $root = null;
    public $pageName = null;
    public $rootLink = null;

    public function __construct()
    {
        $this->root = "admin";
        $this->pageName = "user";

        $this->rootLink = "$this->root/$this->pageName";
    }

    public function index()
    {
        $rootLink = $this->rootLink; // "admin/user"
        
        $users = DB::table('users')->get();

        return view(
            "$rootLink/index",
            compact("users", "rootLink")
        );
    }

    public function add()
    {
        $rootLink = $this->rootLink;

        return view(
            "$rootLink/add",
            compact("rootLink")
        );
    }

    public function doAdd(Request $request)
    {
        $rootLink = $this->rootLink;

        $request->validate([
            "name"             => "required",
            "access_type"      => "required",
            "email"            => "required|unique:users",
            "password"         => "required|min:6",
            "re_password"      => "required|same:password",
        ]);

        $data = $request->all();

        $data['password'] = bcrypt($data['password']);

        DB::table("users")->insert([
            'name'        => $data['name'],
            'email'       => $data['email'],
            'password'    => $data['password'],
            'access_type' => $data['access_type'],
        ]);

        $this->message("Data Berhasil Ditambahkan", 'success');

        return redirect("$rootLink");
    }

    public function update($id)
    {
        $rootLink = $this->rootLink;

        $user = DB::table('users')->where("id", $id)->first();

        return view(
            "$rootLink/update",
            compact("rootLink", "user")
        );
    }

    public function doUpdate(Request $request, $id)
    {
        $rootLink = $this->rootLink;

        $request->validate([
            "name"             => "required",
            "access_type"      => "required",
            "email"            => "required",
        ]);

        $data = $request->all();

        DB::table("users")
            ->where("id", $id)
            ->update([
                'name'        => $data['name'],
                'email'       => $data['email'],
                'access_type' => $data['access_type'],
            ]);

        $this->message("Data Berhasil Ubah", 'success');

        return redirect("$rootLink");
    }

    public function doDelete($id)
    {
        $rootLink = $this->rootLink;

        DB::table("users")
            ->where("id", $id)
            ->delete();

        $this->message("Data Berhasil Hapus", 'success');

        return redirect("$rootLink");
    }
}
