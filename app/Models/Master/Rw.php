<?php

namespace App\Models\Master;

use App\Models\Master\Kampung;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Rw extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $table = 'm_rw';
    protected $fillable = ['no','user_id','ketua','no_nik'];

    public function kampungs()
    {
        return $this->hasMany(Kampung::class, 'rw_id', 'id');
    }
}