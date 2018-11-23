<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusBangunan extends Model
{
    protected $table = 'status_bangunans';
    protected $primaryKey = 'statusid';
    public $timestamps = true;
    protected $fillable = ['nama','keterangan'];

    public function buildings(){
        return $this->hasMany('App\Building','statusid');
    }
}
