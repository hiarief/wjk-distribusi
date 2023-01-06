<?php

namespace App\Http\Controllers\Siode\Dashboard;

use App\Models\Master\RtRw;
use Illuminate\Http\Request;
use App\Models\Tabel\KartuKeluarga;
use App\Http\Controllers\Controller;
use App\Models\Tabel\KartuKeluargaAnggota;

class DashboardController extends Controller
{
    public function index()
    {
        $input = array("bg-danger", "bg-primary", "bg-info", "bg-success", "bg-warning");
        $rand_keys = array_rand($input, 2);
        $ran = $input[$rand_keys[0]];  
        
        $rtrt = RtRw::with(['keluargart' => function ($q){
            $q->withCount('kartukeluargaanggota');
        }])->get();

        
        $kk = KartuKeluarga::select('id')->get()->count();
        $pen = KartuKeluargaAnggota::select('id')->get()->count();
        $rt = KartuKeluarga::get()->groupBy('rt');
        $rw = KartuKeluarga::get()->groupBy('rw');
        $kp = KartuKeluarga::get()->groupBy('kp');
        return view('siode.dashboard.dashboard', compact('rt', 'ran', 'rw', 'kk', 'pen'));
    }
}