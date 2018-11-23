<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan;
use App\Kecamatan;
use App\StatusBangunan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class DataMasterController extends Controller
{
    public function index()
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $kecamatans=Kecamatan::count();
            $kelurahans=Kelurahan::count();
            $status=StatusBangunan::count();

            return view('datamaster',compact('kecamatans','kelurahans','status'));
        }
    }
}
