<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KewarganegaraanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citizen = [
            [
                'nama' => 'WNI'
            ],
            [
                'nama' => 'WNA'
            ],
            [
                'nama' => 'DUA KEWARGANEGARAAN'
            ],
        ];
        \DB::table('m_kewarganegaraan')->insert($citizen);
    }
}