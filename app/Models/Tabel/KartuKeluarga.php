<?php

namespace App\Models\Tabel;

use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Tabel\KartuKeluargaAnggota;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KartuKeluarga extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table ='t_kartu_keluarga';
    protected $fillable = ['no_kk', 'kp', 'rt', 'rw', 'kodepos', 'desa', 'kecamatan', 'kabkot', 'provinsi', 'user_id'];

    public function kartukeluargaanggota()
    {
        return $this->hasMany(KartuKeluargaAnggota::class, 'no_kk', 'id');
    }

    public function provinces()
    {
        return $this->hasOne(Province::class, 'code', 'provinsi');
    }

    public function cities()
    {
        return $this->hasOne(City::class, 'code', 'kabkot');
    }

    public function districts()
    {
        return $this->hasOne(District::class, 'code', 'kecamatan');
    }

    public function villages()
    {
        return $this->hasOne(Village::class, 'code', 'desa');
    }

    public function rtrw()
    {
        return $this->hasOne(RtRw::class, 'id', 'id');
    }
}