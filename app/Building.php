<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Building extends Model
{
    use Sortable;

    protected $table = 'buildings';
    protected $primaryKey = 'buildingid';
    public $timestamps = true;
    protected $fillable = ['regionid','nomor','nobangunan','namapemilik'
    ,'fungsibangunan','statusbangunan','statustanah','luastanah',
    'jumlahlantai','tinggibangunan','koefisiendasarbangunan',
    'imb','gsj','gsb','gss','kdb','latitude','longitude','foto'];

    public $sortable = ['regionid','jumlahlantai','tinggibangunan','gsj','gsb','gss','kdb'];

    public function regional()
    {
        return $this->belongsTo('App\Regional','regionid');
    }

    public function statusbangunans()
    {
        return $this->belongsTo('App\StatusBangunan','statusbangunan');
    }
}
