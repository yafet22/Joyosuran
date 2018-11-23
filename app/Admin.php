<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['username','password'];
}
