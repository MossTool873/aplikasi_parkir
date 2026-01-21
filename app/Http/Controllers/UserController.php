<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('role')
            ->whereNull('deleted_at')
            ->get();

        return view('user.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // VALIDASI WAJIB
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:6',
            'nama'     => 'required',
            'role_id'  => 'required|exists:tb_role,id',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/user/create')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Semua field wajib diisi');
        }

        $uniqueValidator = Validator::make($request->all(), [
            'email' => 'unique:users,email',
        ]);

        if ($uniqueValidator->fails()) {
            return redirect('/admin/user/create')
                ->withErrors($uniqueValidator)
                ->withInput()
                ->with('error', 'Email sudah digunakan');
        }

        User::create([
            'email'    => $request->email,
            'password' => Hash::make($request->password), 
            'name'     => $request->nama,
            'role_id'  => $request->role_id,
        ]);

        return redirect('/admin/user')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::all();

        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'email'   => 'required|email|unique:users,email,' . $user->id,
            'nama'    => 'required',
            'role_id' => 'required|exists:tb_role,id',
            'password'=> 'nullable|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/user/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'email'   => $request->email,
            'nama'    => $request->nama,
            'role_id' => $request->role_id,
            'no_telp' => $request->no_telp,
        ];

        // password hanya diupdate jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/admin/user')
            ->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'deleted_at' => now()
        ]);

        return redirect('/admin/user')
            ->with('success', 'User berhasil dihapus');
    }
}

