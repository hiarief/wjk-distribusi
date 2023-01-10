<?php

namespace App\Http\Controllers\Siode\WilayahAdministratif;

use App\Models\Master\Rt;
use App\Models\Master\Rw;
use Illuminate\Http\Request;
use App\Models\Master\Kampung;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RtController extends Controller
{
    public function index()
    {
        $rw = Rw::pluck('no', 'id');

        // $warga = Rt::groupBy()
        $kampungs = Kampung::with(['rukuntetangga','rukunwarga'])->orderBy('rw_id')->get()->groupBy('rw_id');
        $keyby = Rt::get()->keyBy('no');
        return view('siode.infodesa.wilayah-administratif.rt.index', compact('rw','kampungs', 'keyby'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $kp = new Kampung();
            $kp->rw_id = $request->rw_id;
            $kp->nama = $request->nama;
            $kp->user_id = \Auth::user()->id;
            $kp->save();
            $kpid = $kp->id;

            for ($i = 0; $i < count($request->ketua); $i++) {
                $rts = new Rt();
                $rts->kp_id = $kpid;
                $rts->no = $request->no[$i];
                $rts->ketua = $request->ketua[$i];
                $rts->no_nik = $request->no_nik[$i];
                $rts->user_id = \Auth::user()->id;
                $rts->save();
            }
            DB::commit();
            return redirect()
                ->route('siode.infodesa.rt.index')
                ->with('success', 'Data berhasil disimpan !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->with('error', 'Data gagal disimpan !');
        }
    }
}