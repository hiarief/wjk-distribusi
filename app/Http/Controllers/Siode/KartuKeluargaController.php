<?php

namespace App\Http\Controllers\Siode;

use Illuminate\Http\Request;
use App\Models\Tabel\KartuKeluarga;
use App\Http\Controllers\Controller;
use App\Models\Tabel\KartuKeluargaAnggota;
use App\Http\Requests\KartuKeluarga\StoreKartuKeluargaRequest;

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

        return $kartukeluargaanggota;
    }

    public function create()
    {

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