<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = "types";
    protected $fillable = ['nama_type', 'kode_type' ];

    public function mobils()
    {
        return $this->hasMany('App\Models\Mobil');
    }
}
