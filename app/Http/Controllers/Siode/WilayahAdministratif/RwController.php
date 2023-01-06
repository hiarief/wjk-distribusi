<?php

namespace App\Http\Controllers\Siode\WilayahAdministratif;

use App\Models\Master\Rw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Tabel\KartuKeluargaAnggota;

class RwController extends Controller
{
    public function index()
    {
        $rw = Rw::get();
        return view('siode.infodesa.wilayah-administratif.rw.index', compact('rw'));
    }

    public function store(Request $request)
    {
        $rw = new Rw();
        $rw->no = $request->no;
        $rw->ketua = $request->ketua;
        $rw->no_nik = $request->no_nik;
        $rw->user_id = \Auth::user()->id;
        $rw->save();
        return redirect()
                ->route('siode.infodesa.rw.index')
                ->with('success', 'Data berhasil disimpan !');
    }

    public function autocomplete(Request $request)
    {
        // dd($request->all());
        $search = $request->search;

        if ($search == '') {
            $kartukeluargaanggota = KartuKeluargaAnggota::orderby('nama', 'asc')
                ->select('id', 'nama','no_nik')
                ->orWhere('nama', 'like', '%' . $search . '%')
                ->limit(15)
                ->get();
        } else {
            $kartukeluargaanggota = KartuKeluargaAnggota::orderby('nama', 'asc')
                ->select('id', 'nama','no_nik')
                ->where('nama', 'like', '%' . $search . '%')
                ->limit(15)
                ->get();
        }

        $response = [];
        foreach ($kartukeluargaanggota as $anggota) {
            $response[] = [
                'label' => $anggota->nama,
                'nonik' => $anggota->no_nik,
            ];
        }

        return response()->json($response);
    }
}