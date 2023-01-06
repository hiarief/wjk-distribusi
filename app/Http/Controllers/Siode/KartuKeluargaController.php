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
        return view('siode.kependudukan.keluarga.create', compact('provinces', 'pekerjaan', 'pernikahan', 'hubungankeluarga', 'goldarah', 'pendidikankeluarga', 'agama', 'kewarganegaraan', 'jeniskelamin', 'rtrw'));
    }

    public function store(StoreKartuKeluargaRequest $request)
    {
        DB::beginTransaction();
        try {
            $d = $request->all();
            $kartukeluarga = new KartuKeluarga();
            $kartukeluarga->no_kk = $d['no_kk'];
            $kartukeluarga->kp = $d['kp'];
            $kartukeluarga->rt = $d['rt'];
            $kartukeluarga->rw = $d['rw'];
            $kartukeluarga->kodepos = $d['kodepos'];
            $kartukeluarga->desa = $d['desa'];
            $kartukeluarga->kecamatan = $d['kecamatan'];
            $kartukeluarga->kabkot = $d['kabkot'];
            $kartukeluarga->provinsi = $d['provinsi'];
            $kartukeluarga->user_id = \Auth::user()->id;
            $kartukeluarga->save();

            $kartukeluargaanggota = new KartuKeluargaAnggota();
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
            $kartukeluarga->kartukeluargaanggota()->save($kartukeluargaanggota);

            DB::commit();
            return redirect()
                ->route('siode.kependudukan.kartu-keluarga.index')
                ->with('success', 'Data berhasil disimpan !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->with('error', 'Data gagal disimpan !');
        }
    }

    public function edit($kartu_keluarga)
    {
        $kartukeluargaanggota = KartuKeluargaAnggota::with('kartukeluarga')->findOrFail($kartu_keluarga);
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

        return view('siode.kependudukan.keluarga.edit', compact('kartukeluargaanggota', 'provinces', 'pekerjaan', 'pernikahan', 'hubungankeluarga', 'goldarah', 'pendidikankeluarga', 'agama', 'kewarganegaraan', 'jeniskelamin', 'rtrw'));
    }

    public function update(UpdateKartuKeluargaRequest $request, $kartu_keluarga)
    {
        DB::beginTransaction();
        try {
            $d = $request->all();
            $kartukeluarga = KartuKeluarga::findOrFail($request->famillyid)->update([
                'no_kk' => $d['no_kk'],
                'kp' => $d['kp'],
                'rt' => $d['rt'],
                'rw' => $d['rw'],
                'kodepos' => $d['kodepos'],
                'desa' => $d['desa'],
                'kecamatan' => $d['kecamatan'],
                'kabkot' => $d['kabkot'],
                'provinsi' => $d['provinsi'],
            ]);
            $kartukeluargaanggota = KartuKeluargaAnggota::findOrFail($kartu_keluarga)->update([
                'no_kk' => $d['famillyid'],
                'no_nik' => $d['no_nik'],
                'nama' => $d['nama'],
                'jenkel' => $d['jenkel'],
                'tgl_lahir' => $d['tgl_lahir'],
                'tmpt_lahir' => $d['tmpt_lahir'],
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
            DB::commit();
            return redirect()
                ->route('siode.kependudukan.kartu-keluarga.index')
                ->with('success', 'Data berhasil diupdate !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->with('error', 'Data gagal diupdate !');
        }
    }

    public function destroy($kartu_keluarga)
    {
        $kartukeluargaanggota = KartuKeluargaAnggota::findOrFail($kartu_keluarga);
        $kartukeluargaanggota->delete();
        return redirect()
            ->back()
            ->with('success', 'Data berhasil dihapus !');
    }

    public function viewDelete()
    {
        $kartukeluargaanggota = KartuKeluargaAnggota::onlyTrashed()->paginate(10);
        // return $kartukeluargaanggota;
        return view('siode.kependudukan.keluarga.delete', compact('kartukeluargaanggota'));
    }

    public function restore($kartu_keluarga)
    {
        $kartukeluargaanggota = KartuKeluargaAnggota::withTrashed()->findOrFail($kartu_keluarga);
        $kartukeluargaanggota->restore();

        // Alert::success('Success', 'Data berhasil direstore !');
        return redirect()
            ->back()
            ->with('success', 'Data Anda Berhasil Direstore !');
    }

    public function kill($kartu_keluarga)
    {
        $kartukeluargaanggota = KartuKeluargaAnggota::withTrashed()->findOrFail($kartu_keluarga);
        $kartukeluargaanggota->forceDelete();

        // Alert::success('Success', 'Data berhasil berhasil dihapus secara permanent !');
        return redirect()
            ->back()
            ->with('kill', 'Data Anda Berhasil Dihapus Secara Permanent');
    }
}