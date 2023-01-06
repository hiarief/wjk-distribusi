<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampung extends Model
{
    use HasFactory;
    protected $table = 'm_kampung';
    protected $fillable = ['nama', 'user_id'];
}