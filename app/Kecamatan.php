<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatans';
    protected $primaryKey = 'kecamatanid';
    public $timestamps = true;
    protected $fillable = ['nama','keterangan','nokecamatan'];

    public function kelurahans(){
        return $this->hasMany('App\Kelurahan','kecamatanid');
    }

    public function regionals(){
        return $this->hasMany('App\Regional','kecamatanid');
    }
}
