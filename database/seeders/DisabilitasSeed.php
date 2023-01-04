<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisabilitasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disabilities = [
        [
            'nama' => 'CACAT FISIK'
        ],
        [
            'nama' => 'CACAT NETRA/BUTA'
        ],
        [
            'nama' => 'CACAT RUNGU/WICARA'
        ],
        [
            'nama' => 'CACAT MENTAL/JIWA'
        ],
        [
            'nama' => 'CACAT FISIK DAN MENTAL'
        ],
        [
            'nama' => 'CACAT LAINNYA'
        ],
        [
            'nama' => 'TIDAK CACAT'
        ],
    ];
    \DB::table('m_disabilitas')->insert($disabilities);
    }
}