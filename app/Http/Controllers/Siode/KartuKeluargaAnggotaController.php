<?php

namespace App\Http\Controllers\Siode;

use App\Models\Master\RtRw;
use App\Models\Master\Agama;
use Illuminate\Http\Request;
use App\Models\Master\GolDarah;
use App\Models\Master\Pekerjaan;
use App\Models\Master\Pernikahan;
use Illuminate\Support\Facades\DB;
use App\Models\Master\JenisKelamin;
use App\Models\Tabel\KartuKeluarga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\Kewarganegaraan;
use App\Models\Master\HubunganKeluarga;
use Laravolt\Indonesia\Models\Province;
use App\Models\Master\PendidikanKeluarga;
use App\Models\Tabel\KartuKeluargaAnggota;
use App\Http\Requests\KartuKeluargaAnggota\StoreKartuKeluargaAnggotaRequest;
use App\Http\Requests\KartuKeluargaAnggota\UpdateKartuKeluargaAnggotaRequest;

class KartuKeluargaAnggotaController extends Controller
{
    public function index()
    {
        $kartukeluargaanggota = KartuKeluargaAnggota::latest()
            ->with([
                'kartukeluarga' => function ($q) {
                    $q->with(['districts', 'villages']);
                },
            ])
            ->paginate(10);

        return view('siode.kependudukan.penduduk.index', compact('kartukeluargaanggota'));
    }

    public function autocompleteSearch(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $kartukeluargaanggota = KartuKeluargaAnggota::orderby('nama', 'asc')
                ->select('id', 'nama')
                ->whereSts_hub_kel(1)
                ->orWhere('nama', 'like', '%' . $search . '%')
                ->with('kartukeluarga')
                ->limit(5)
                ->get();
        } else {
            $kartukeluargaanggota = KartuKeluargaAnggota::orderby('nama', 'asc')
                ->whereSts_hub_kel(1)
                ->where('nama', 'like', '%' . $search . '%')
                ->with('kartukeluarga')
                ->limit(5)
                ->get();
        }

        $response = [];
        foreach ($kartukeluargaanggota as $anggota) {
            $response[] = [
                'label' => $anggota->nama,
                'nokk' => $anggota->kartukeluarga->no_kk,
                'provinsi' => $anggota->kartukeluarga->provinces->name,
                'kabkot' => $anggota->kartukeluarga->cities->name,
                'kecamatan' => $anggota->kartukeluarga->districts->name,
                'desa' => $anggota->kartukeluarga->villages->name,
                'kp' => $anggota->kartukeluarga->kp,
                'rt' => $anggota->kartukeluarga->rt,
                'rw' => $anggota->kartukeluarga->rw,
            ];
        }

        return response()->json($response);
    }

    public function create()
    {
        $kartukeluargaanggota = KartuKeluargaAnggota::whereSts_hub_kel(1)
            ->with([
                'kartukeluarga' => function ($q) {
                    $q->with(['provinces', 'cities', 'districts', 'villages']);
                },
            ])
            ->get();
        // $provinces = Province::where('code', '36')->pluck('name', 'code');
        $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->pluck('nama', 'id');
        $pernikahan = Pernikahan::orderBy('id', 'ASC')->pluck('nama', 'id');
        $hubungankeluarga = HubunganKeluarga::orderBy('id', 'ASC')->pluck('nama', 'id');
        $goldarah = GolDarah::orderBy('id', 'ASC')->pluck('nama', 'id');
        $pendidikankeluarga = PendidikanKeluarga::orderBy('id', 'ASC')->pluck('nama', 'id');
        $agama = Agama::orderBy('id', 'ASC')->pluck('nama', 'id');
        $kewarganegaraan = Kewarganegaraan::orderBy('id', 'ASC')->pluck('nama', 'id');
        $jeniskelamin = JenisKelamin::orderBy('id', 'ASC')->pluck('nama', 'id');
        $rtrw = RtRw::get();
        return view('siode.kependudukan.penduduk.create', compact('kartukeluargaanggota', 'pekerjaan', 'pernikahan', 'hubungankeluarga', 'goldarah', 'pendidikankeluarga', 'agama', 'kewarganegaraan', 'jeniskelamin', 'rtrw'));
    }

    public function store(StoreKartuKeluargaAnggotaRequest $request)
    {
        DB::beginTransaction();
        try {
            $d = $request->all();
            $kartukeluargaanggota = new KartuKeluargaAnggota();
            $kartukeluargaanggota->no_kk = $d['no_kk'];
            $kartukeluargaanggota->no_nik = $d['no_nik'];
            $kartukeluargaanggota->nama = $d['nama'];
            $kartukeluargaanggota->jenkel = $d['jenkel'];
            $kartukeluargaanggota->tgl_lahir = $d['tgl_lahir'];
            $kartukeluargaanggota->tmpt_lahir = $d['tmpt_lahir'];
            $kartukeluargaanggota->agama = $d['agama'];
            $kartukeluargaanggota->pendidikan = $d['pendidikan'];
            $kartukeluargaanggota->jns_pekerjaan = $d['jns_pekerjaan'];
            $kartukeluargaanggota->gol_darah = $d['gol_darah'];
            $kartukeluargaanggota->sts_perkawinan = $d['sts_perkawinan'];
            $kartukeluargaanggota->tgl_perkawinan = $d['tgl_perkawinan'];
            $kartukeluargaanggota->sts_hub_kel = $d['sts_hub_kel'];
            $kartukeluargaanggota->sts_kwn = $d['sts_kwn'];
            $kartukeluargaanggota->nm_ayah = $d['nm_ayah'];
            $kartukeluargaanggota->nm_ibu = $d['nm_ibu'];
            $kartukeluargaanggota->nik_ayah = $d['nik_ayah'];
            $kartukeluargaanggota->nik_ibu = $d['nik_ibu'];
            $kartukeluargaanggota->sts_mati = 0;
            $kartukeluargaanggota->no_paspor = $d['no_paspor'];
            $kartukeluargaanggota->no_kitap = $d['no_kitap'];
            $kartukeluargaanggota->user_id = \Auth::user()->id;
            $kartukeluargaanggota->sts = 0;
            $kartukeluargaanggota->save();
            DB::commit();

            return redirect()
                ->route('siode.kependudukan.anggota-keluarga.index')
                ->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->with('error', 'Data gagal disimpan !');
        }
    }

    public function edit($anggota_keluarga)
    {
        $kartukeluargaanggota = KartuKeluargaAnggota::whereSts_hub_kel(1)
            ->with([
                'kartukeluarga' => function ($q) {
                    $q->with(['provinces', 'cities', 'districts', 'villages']);
                },
            ])
            ->get();
        $anggota = KartuKeluargaAnggota::with('kartukeluarga')->findOrFail($anggota_keluarga);
        $pekerjaan = Pekerjaan::orderBy('nama', 'ASC')->pluck('nama', 'id');
        $pernikahan = Pernikahan::orderBy('id', 'ASC')->pluck('nama', 'id');
        $hubungankeluarga = HubunganKeluarga::orderBy('id', 'ASC')->pluck('nama', 'id');
        $goldarah = GolDarah::orderBy('id', 'ASC')->pluck('nama', 'id');
        $pendidikankeluarga = PendidikanKeluarga::orderBy('id', 'ASC')->pluck('nama', 'id');
        $agama = Agama::orderBy('id', 'ASC')->pluck('nama', 'id');
        $kewarganegaraan = Kewarganegaraan::orderBy('id', 'ASC')->pluck('nama', 'id');
        $jeniskelamin = JenisKelamin::orderBy('id', 'ASC')->pluck('nama', 'id');
        $rtrw = RtRw::get();
        return view('siode.kependudukan.penduduk.edit', compact('anggota', 'kartukeluargaanggota', 'pekerjaan', 'pernikahan', 'hubungankeluarga', 'goldarah', 'pendidikankeluarga', 'agama', 'kewarganegaraan', 'jeniskelamin', 'rtrw'));
    }

    public function update(UpdateKartuKeluargaAnggotaRequest $request, $anggota_keluarga)
    {
        $d = $request->all();
        $kartukeluargaanggota = KartuKeluargaAnggota::findOrFail($anggota_keluarga)->update([
            'no_nik' => $d['no_nik'],
            'nama' => $d['nama'],
            'jenkel' => $d['jenkel'],
            'tgl_lahir' => $d['tgl_lahir'],
            'tgl_lahir' => $d['tgl_lahir'],
            'agama' => $d['agama'],
            'pendidikan' => $d['pendidikan'],
            'jns_pekerjaan' => $d['jns_pekerjaan'],
            'gol_darah' => $d['gol_darah'],
            'sts_perkawinan' => $d['sts_perkawinan'],
            'tgl_perkawinan' => $d['tgl_perkawinan'],
            'sts_hub_kel' => $d['sts_hub_kel'],
            'sts_kwn' => $d['sts_kwn'],
            'nm_ayah' => $d['nm_ayah'],
            'nm_ibu' => $d['nm_ibu'],
            'nik_ayah' => $d['nik_ayah'],
            'nik_ibu' => $d['nik_ibu'],
            'no_paspor' => $d['no_paspor'],
            'no_kitap' => $d['no_kitap'],
        ]);
        // Alert::success('Success', 'Data berhasil diupdate !');
        return redirect()
            ->route('siode.kependudukan.anggota-keluarga.index')
            ->with('success', 'Data berhasil diupdate !');
    }

    public function show()
    {
    }

    public function destroy()
    {
    }
}