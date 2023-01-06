<?php

namespace App\Models\Master;

use App\Models\Tabel\KartuKeluarga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RtRw extends Model
{
    use HasFactory;
    protected $table = 'm_rt_rw';


    public function keluargart()
    {
        return $this->hasMany(KartuKeluarga::class, 'rt', 'rt');
    }

    public function keluargarw()
    {
        return $this->hasMany(KartuKeluarga::class, 'rw', 'rw');
    }
}