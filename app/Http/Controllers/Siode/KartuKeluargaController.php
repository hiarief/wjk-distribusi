<?php

namespace App\Http\Controllers\Siode;

use App\Models\Master\RtRw;
use App\Models\Master\Agama;
use Illuminate\Http\Request;
use App\Models\Master\GolDarah;
use App\Models\Master\Pekerjaan;
use App\Models\Master\Pernikahan;
use App\Models\Master\JenisKelamin;
use App\Models\Tabel\KartuKeluarga;
use App\Http\Controllers\Controller;
use App\Models\Master\Kewarganegaraan;
use App\Models\Master\HubunganKeluarga;
use Laravolt\Indonesia\Models\Province;
use App\Models\Master\PendidikanKeluarga;
use App\Models\Tabel\KartuKeluargaAnggota;
use App\Http\Requests\KartuKeluarga\StoreKartuKeluargaRequest;
use App\Http\Requests\KartuKeluarga\UpdateKartuKeluargaRequest;

class KartuKeluargaController extends Controller
{
    public function index()
    {
        $kartukeluargaanggota = KartuKeluargaAnggota::whereSts_hub_kel(1)
            ->latest()
            ->with([
                'kartukeluarga' => function ($q) {
                    $q->with(['districts', 'villages']);
                },
            ])
            ->paginate(10);

        return view('siode.kependudukan.keluarga.index', compact('kartukeluargaanggota'));
    }

    public function create()
    {
        $provinces = Province::where('code', '36')->pluck('name', 'code');
        $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->pluck('nama', 'id');
        $pernikahan = Pernikahan::orderBy('id', 'ASC')->pluck('nama', 'id');
        $hubungankeluarga = HubunganKeluarga::orderBy('id', 'ASC')->pluck('nama', 'id');
        $goldarah = GolDarah::orderBy('id', 'ASC')->pluck('nama', 'id');
        $pendidikankeluarga = PendidikanKeluarga::orderBy('id', 'ASC')->pluck('nama', 'id');
        $agama = Agama::orderBy('id', 'ASC')->pluck('nama', 'id');
        $kewarganegaraan = Kewarganegaraan::orderBy('id', 'ASC')->pluck('nama', 'id');
        $jeniskelamin = JenisKelamin::orderBy('id', 'ASC')->pluck('nama', 'id');
        $rtrw = RtRw::get();
        return view('siode.kependudukan.keluarga.create', compact('provinces','pekerjaan','pernikahan','hubungankeluarga','goldarah','pendidikankeluarga','agama','kewarganegaraan','jeniskelamin','rtrw'));
    }

    public function store(StoreKartuKeluargaRequest $request)
    {
        
    }

    public function edit(KartuKeluargaAnggota $kartu_keluarga)
    {

    }

    public function update(UpdateKartuKeluargaRequest $request)
    {
        
    }
}