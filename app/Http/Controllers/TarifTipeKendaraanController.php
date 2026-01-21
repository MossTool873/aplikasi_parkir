<?php

namespace App\Http\Controllers;

use App\Models\TarifTipeKendaraan;
use App\Models\TipeKendaraan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TarifTipeKendaraanController extends Controller
{
    public function index()
    {
        $tarifTipeKendaraans = TarifTipeKendaraan::with('tipeKendaraan')->get();

        return view('tarifTipeKendaraan.index', compact('tarifTipeKendaraans'));
    }

    public function create()
    {
        $tipeKendaraans = TipeKendaraan::all();

        $tipeTerpakai = TarifTipeKendaraan::pluck('tipe_kendaraan_id')->toArray();

        return view(
            'tarifTipeKendaraan.create',
            compact('tipeKendaraans', 'tipeTerpakai')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe_kendaraan_id' => [
                'required',
                'exists:tb_tipe_kendaraan,id',
                Rule::unique('tb_tarif_tipe_kendaraan', 'tipe_kendaraan_id')
                    ->whereNull('deleted_at')
            ],
            'tarif_perjam' => 'required|numeric|min:0'
        ], [
            'tipe_kendaraan_id.unique' => 'Tipe kendaraan ini sudah memiliki tarif.'
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
        $tipeKendaraans = TipeKendaraan::all();

        return view('tarifTipeKendaraan.edit', compact('tarif', 'tipeKendaraans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipe_kendaraan_id' => 'required|exists:tb_tipe_kendaraan,id',
            'tarif_perjam'      => 'required|numeric|min:0'
        ]);

        $tarif = TarifTipeKendaraan::findOrFail($id);
        $tarif->update([
            'tarif_perjam' => $request->tarif_perjam
        ]);

        return redirect('/admin/tarifTipeKendaraan');
    }


    public function destroy($id)
    {
        $tarif = TarifTipeKendaraan::findOrFail($id);
        $tarif->delete(); // Soft delete

        return redirect('/admin/tarifTipeKendaraan');
    }
}
