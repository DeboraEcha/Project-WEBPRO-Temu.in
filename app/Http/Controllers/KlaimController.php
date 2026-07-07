<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klaim;
use App\Models\Laporan;

class KlaimController extends Controller
{
    public function index()
    {
        $klaim = Klaim::latest()->get();

        return view('v_klaim.index', compact('klaim'));
    }

    public function create()
    {
        $laporan = Laporan::all();

        return view('v_klaim.tambah', compact('laporan'));
    }

    public function store(Request $request)
    {
        Klaim::create([

            'id_laporan' => $request->id_laporan,

            'nama_pengklaim' => $request->nama_pengklaim,

            'no_hp_pengklaim' => $request->no_hp_pengklaim,

            'bukti_klaim' => $request->bukti_klaim,

            'status' => 'pending'
        ]);

        return redirect('/klaim');
    }

    public function edit($id)
    {
        $klaim = Klaim::find($id);

        $laporan = Laporan::all();

        return view('v_klaim.edit', compact('klaim', 'laporan'));
    }

    public function update(Request $request, $id)
    {
        $klaim = Klaim::find($id);

        $klaim->update([

            'id_laporan' => $request->id_laporan,

            'nama_pengklaim' => $request->nama_pengklaim,

            'no_hp_pengklaim' => $request->no_hp_pengklaim,

            'bukti_klaim' => $request->bukti_klaim,

            'status' => $request->status
        ]);

        return redirect('/klaim');
    }

    public function destroy($id)
    {
        $klaim = Klaim::find($id);

        $klaim->delete();

        return redirect('/klaim');
    }
}