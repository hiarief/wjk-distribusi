<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKelaminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sex = [
            [
                'nama' => 'LAKI-LAKI'
            ],
            [
                'nama' => 'PEREMPUAN'
            ],
        ];
        \DB::table('m_jenis_kelamin')->insert($sex);
    }
}