<?php

namespace App\Models\Tabel;

use App\Models\Master\Agama;
use App\Models\Master\GolDarah;
use App\Models\Master\Pekerjaan;
use App\Models\Master\Pernikahan;
use App\Models\Master\JenisKelamin;
use App\Models\Tabel\KartuKeluarga;
use App\Models\Master\Kewarganegaraan;
use App\Models\Master\HubunganKeluarga;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Master\PendidikanKeluarga;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KartuKeluargaAnggota extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table = 't_kartu_keluarga_anggota';
    protected $fillable = ['no_kk', 'no_nik', 'nama', 'jenkel', 'tgl_lahir', 'tmpt_lahir', 'agama', 'pendidikan', 'jns_pekerjaan', 'gol_darah', 'sts_perkawinan', 'tgl_perkawinan', 'sts_hub_kel', 'sts_kwn', 'sts_mati', 'nm_ayah', 'nm_ibu', 'nik_ayah', 'nik_ibu', 'no_paspor', 'no_kitap', 'userid'];

    public function kartukeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class, 'no_kk', 'id');
    }

    public function jeniskelamin()
    {
        return $this->hasOne(JenisKelamin::class, 'id', 'jenkel');
    }

    public function agama()
    {
        return $this->hasOne(Agama::class, 'id', 'agama');
    }

    public function pendidikankeluarga()
    {
        return $this->hasOne(PendidikanKeluarga::class, 'id', 'pendidikan');
    }

    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class, 'id', 'jns_pekerjaan');
    }

    public function goldarah()
    {
        return $this->hasOne(GolDarah::class, 'id', 'gol_darah');
    }

    public function hubungankeluarga()
    {
        return $this->hasOne(HubunganKeluarga::class, 'id', 'sts_hub_kel');
    }

    public function pernikahan()
    {
        return $this->hasOne(Pernikahan::class, 'id', 'sts_perkawinan');
    }

    public function kewarganegaraan()
    {
        return $this->hasOne(Kewarganegaraan::class, 'id', 'sts_kwn');
    }
}