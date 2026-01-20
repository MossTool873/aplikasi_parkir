<?php

namespace App\Http\Controllers;

use App\Models\TarifTipeKendaraan;
use App\Models\TipeKendaraan;
use Illuminate\Http\Request;

class TarifTipeKendaraanController extends Controller
{
    public function index()
    {
        $tarifTipeKendaraans = TarifTipeKendaraan::with('tipeKendaraan')->get();
        return view('tarifTipeKendaraan.index', compact('tarifTipeKendaraans'));
    }

    public function create()
    {
        $tipeKendaraans = TipeKendaraan::whereNull('deleted_at')->get();
        return view('tarifTipeKendaraan.create', compact('tipeKendaraans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe_kendaraan_id' => 'required|exists:tb_tipe_kendaraan,id',
            'tarif_perjam'      => 'required|numeric|min:0'
        ]);

        TarifTipeKendaraan::create([
            'tipe_kendaraan_id' => $request->tipe_kendaraan_id,
            'tarif_perjam'      => $request->tarif_perjam
        ]);

        return redirect('/admin/tarifTipeKendaraan');
    }

    public function edit($id)
    {
        $tarif = TarifTipeKendaraan::findOrFail($id);
        $tipeKendaraans = TipeKendaraan::whereNull('deleted_at')->get();

        return view('tarifTipeKendaraan.edit', compact('tarif', 'tipeKendaraans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipe_kendaraan_id' => 'required|exists:tb_tipe_kendaraan,id',
            'tarif_perjam'      => 'required|numeric|min:0'
        ]);

        TarifTipeKendaraan::where('id', $id)->update([
            'tipe_kendaraan_id' => $request->tipe_kendaraan_id,
            'tarif_perjam'      => $request->tarif_perjam
        ]);

        return redirect('/admin/tarifTipeKendaraan');
    }

    public function delete($id)
    {
        TarifTipeKendaraan::findOrFail($id)->delete();
        return redirect('/admin/tarifTipeKendaraan');
    }
}
