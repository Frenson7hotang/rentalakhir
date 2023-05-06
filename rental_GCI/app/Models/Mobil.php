<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at'];
    protected $table = "mobils";
    protected $fillable = ['merekmobil', 'type_id', 'warna', 'harga', 'foto'];

    public function types()
    {

        return $this->belongsTo('App\Models\Type');
    }
}
