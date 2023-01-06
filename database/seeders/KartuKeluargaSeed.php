<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Tabel\KartuKeluarga;
use App\Models\Tabel\KartuKeluargaAnggota;

class KartuKeluargaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Factory::create();
            $jumlahpenduduk = 300;
            for ($i=1; $i <= $jumlahpenduduk; $i++) {
                $data = [
                    'no_kk' => $faker->numberBetween($min = 1, $max = 30),
                    'no_nik' => $faker->unique()->numberBetween($min = 3603021404970001, $max = 3603021409999999),
                    'nama' => $faker->name(),
                    'jenkel' => $faker->numberBetween($min = 1, $max = 2),
                    'tgl_lahir' => $faker->date('Y_m_d'),
                    'tmpt_lahir' => $faker->city(),
                    'agama' => $faker->numberBetween($min = 1, $max = 7),
                    'pendidikan' => $faker->numberBetween($min = 5, $max = 10),
                    'jns_pekerjaan' => $faker->numberBetween($min = 1, $max = 80),
                    'sts_perkawinan' => $faker->numberBetween($min = 1, $max = 4),
                    'tgl_perkawinan' => $faker->date('Y_m_d'),
                    'gol_darah' => $faker->numberBetween($min = 1, $max = 13),
                    'sts_hub_kel' => $faker->numberBetween($min = 1, $max = 11),
                    'sts_kwn' => $faker->numberBetween($min = 1, $max = 3),
                    'nm_ayah' => $faker->firstNameMale(),
                    'nm_ibu' => $faker->firstNameFemale(),
                    'nik_ayah' => $faker->unique()->numberBetween($min = 3603021404970001, $max = 3603021409999999),
                    'nik_ibu' => $faker->unique()->numberBetween($min = 3603021404970001, $max = 3603021409999999),
                    'no_paspor' => $faker->unique()->numberBetween($min = 1000000, $max = 5000000),
                    'no_kitap' => $faker->unique()->numberBetween($min = 1000000, $max = 5000000),
                    'user_id' => $faker->numberBetween($min = 1, $max = 10),
                    'created_at' => $faker->dateTime(),
                ];
                KartuKeluargaAnggota::create($data);
            }
            $jumlahkk = 50;
            for ($i=1; $i <= $jumlahkk; $i++) {
                $alamat = [
                    'no_kk' => $faker->unique()->numberBetween($min = 3603021404970001, $max = 3603021409999999),
                    'kp' => $faker->country(),
                    'rt' => $faker->numberBetween($min = 1, $max = 6),
                    'rw' => $faker->numberBetween($min = 1, $max = 6),
                    'kodepos' => $faker->numberBetween($min = 15610, $max = 19990),
                    'desa' => $faker->numberBetween($min = 3603022001, $max = 3603022001),
                    'kecamatan' => $faker->numberBetween($min = 360302, $max = 360302),
                    'kabkot' => $faker->numberBetween($min = 3603, $max = 3603),
                    'provinsi' => $faker->numberBetween($min = 36, $max = 36),
                ];
                KartuKeluarga::create($alamat);
            }
    }
}