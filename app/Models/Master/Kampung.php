<?php

namespace App\Models\Master;

use App\Models\Master\Rt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kampung extends Model
{
    use HasFactory;
    protected $table = 'm_kampung';
    protected $fillable = ['nama', 'user_id'];

    public function rukuntetangga()
    {
        return $this->hasMany(Rt::class, 'kp_id', 'id');
    }


    public function rukunwarga()
    {
        return $this->belongsTo(Rw::class, 'rw_id', 'id');
    }
}