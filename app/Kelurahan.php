<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahans';
    protected $primaryKey = 'kelurahanid';
    public $timestamps = true;
    protected $fillable = ['nama','keterangan','kecamatanid','nokelurahan'];

    public function kecamatans()
    {
        return $this->belongsTo('App\Kecamatan','kecamatanid');
    }

    public function regionals(){
        return $this->hasMany('App\Regional','kelurahanid');
    }
}
