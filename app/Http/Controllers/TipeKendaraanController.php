<?php

namespace App\Http\Controllers;

use App\Models\TipeKendaraan;
use Illuminate\Http\Request;

class TipeKendaraanController extends Controller
{
    public function index()
    {
        $tipeKendaraans = TipeKendaraan::whereNull('deleted_at')->get();
        return view('tipeKendaraan.index', compact('tipeKendaraans'));
    }

    public function create()
    {
        return view('tipeKendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate(['tipe_kendaraan' => 'required',]);
        TipeKendaraan::create(['tipe_kendaraan' => $request->tipe_kendaraan]);
        return redirect('/admin/tipeKendaraan');
    }

    public function edit($id)
    {
        $tipeKendaraan = TipeKendaraan::findOrFail($id);
        return view('tipeKendaraan.edit', compact('tipeKendaraan'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate(['tipe_kendaraan' => 'required',]);
        TipeKendaraan::where('id', $id)->update(['tipe_kendaraan' => $request->tipe_kendaraan]);
        return redirect('/admin/tipeKendaraan');
    }

    public function destroy($id)
    {
        $tipeKendaraan = TipeKendaraan::findOrFail($id);
        $tipeKendaraan->delete();
        return redirect('/admin/tipeKendaraan');
    }
}
