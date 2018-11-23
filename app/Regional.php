<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Regional extends Model
{
    use Sortable;

    protected $table = 'regionals';
    protected $primaryKey = 'regionid';
    public $timestamps = true;
    protected $fillable = ['rw','rt','kelurahan','kecamatan'];

    public $sortable = ['regionid','rw','rt'];

    public function buildings(){
        return $this->hasMany('App\Building','regionid');
    }

    public function kecamatans()
    {
        return $this->belongsTo('App\Kecamatan','kecamatan');
    }

    public function kelurahans()
    {
        return $this->belongsTo('App\Kelurahan','kelurahan');
    }

}
