<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->whereNull('deleted_at')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'nama'     => 'required',
            'role_id'  => 'required',
            'no_telp'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/user/create')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Semua field wajib diisi');
        }

        $validator_uniqeValidator = Validator::make($request->all(), [
            'username' => 'unique:tb_user,username',
        ]);

        if ($validator_uniqeValidator->fails()) {
            return redirect('/admin/user/create')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Username sudah digunakan');
        }

        User::create([
            'username' => $request->username,
            'password' => $request->password, // sementara tanpa hash
            'nama'     => $request->nama,
            'role_id'  => $request->role_id,
            'no_telp'  => $request->no_telp,
        ]);

        return redirect('/admin/user')->with('success', 'User berhasil ditambahkan');
    }

        public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'username' => $request->username,
            'nama'     => $request->nama,
            'role_id'  => $request->role_id,
            'no_telp'  => $request->no_telp,
        ]);

        return redirect('/admin/user');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'deleted_at' => now()
        ]);

        return redirect('/admin/user');
    }
}
