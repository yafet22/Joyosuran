<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;
use App\StatusBangunan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MapController extends Controller
{
    public function index(Request $request)
    {
        if(!Session::get('login')){
            $buildings = Building::when($request->fungsi, function ($query) use ($request) {
                $query->where('fungsibangunan','like',"%{$request->fungsi}%");
            })->when($request->statusbangunan, function ($query) use ($request) {
                $query->where('statusbangunan','like',"%{$request->statusbangunan}%");
            })->when($request->statustanah, function ($query) use ($request) {
                $query->where('statustanah','like',"%{$request->statustanah}%");
            })->when($request->luastanah, function ($query) use ($request) {
                $query->where('luastanah','like',"%{$request->luastanah}%");
            })->when($request->jumlahlantai, function ($query) use ($request) {
                $query->where('jumlahlantai','like',"%{$request->jumlahlantai}%");
            })->when($request->tinggibangunan, function ($query) use ($request) {
                $query->where('tinggibangunan','like',"%{$request->tinggibangunan}%");
            })->when($request->koefisiendasarbangunan, function ($query) use ($request) {
                $query->where('koefisiendasarbangunan','like',"%{$request->koefisiendasarbangunan}%");
            })->when($request->imb, function ($query) use ($request) {
                $query->where('imb','like',"%{$request->imb}%");
            })->when($request->gsj, function ($query) use ($request) {
                $query->where('gsj','like',"%{$request->gsj}%");
            })->when($request->gsb, function ($query) use ($request) {
                $query->where('gsb','like',"%{$request->gsb}%");
            })->when($request->gss, function ($query) use ($request) {
                $query->where('gss','like',"%{$request->gss}%");
            })->when($request->kdb, function ($query) use ($request) {
                $query->where('kdb','like',"%{$request->kdb}%");
            })->orderBy('latitude', 'DESC')->get(); 
    
            $status = StatusBangunan::pluck('nama','statusid');
            return view('home',compact('buildings','status'));
        }
        else
        {
            $buildings = Building::when($request->fungsi, function ($query) use ($request) {
                $query->where('fungsibangunan','like',"%{$request->fungsi}%");
            })->when($request->statusbangunan, function ($query) use ($request) {
                $query->where('statusbangunan','like',"%{$request->statusbangunan}%");
            })->when($request->statustanah, function ($query) use ($request) {
                $query->where('statustanah','like',"%{$request->statustanah}%");
            })->when($request->luastanah, function ($query) use ($request) {
                $query->where('luastanah','like',"%{$request->luastanah}%");
            })->when($request->jumlahlantai, function ($query) use ($request) {
                $query->where('jumlahlantai','like',"%{$request->jumlahlantai}%");
            })->when($request->tinggibangunan, function ($query) use ($request) {
                $query->where('tinggibangunan','like',"%{$request->tinggibangunan}%");
            })->when($request->koefisiendasarbangunan, function ($query) use ($request) {
                $query->where('koefisiendasarbangunan','like',"%{$request->koefisiendasarbangunan}%");
            })->when($request->imb, function ($query) use ($request) {
                $query->where('imb','like',"%{$request->imb}%");
            })->when($request->gsj, function ($query) use ($request) {
                $query->where('gsj','like',"%{$request->gsj}%");
            })->when($request->gsb, function ($query) use ($request) {
                $query->where('gsb','like',"%{$request->gsb}%");
            })->when($request->gss, function ($query) use ($request) {
                $query->where('gss','like',"%{$request->gss}%");
            })->when($request->kdb, function ($query) use ($request) {
                $query->where('kdb','like',"%{$request->kdb}%");
            })->orderBy('latitude', 'DESC')->get(); 

            $jumlah = Building::when($request->fungsi, function ($query) use ($request) {
                $query->where('fungsibangunan','like',"%{$request->fungsi}%");
            })->when($request->statusbangunan, function ($query) use ($request) {
                $query->where('statusbangunan','like',"%{$request->statusbangunan}%");
            })->when($request->statustanah, function ($query) use ($request) {
                $query->where('statustanah','like',"%{$request->statustanah}%");
            })->when($request->luastanah, function ($query) use ($request) {
                $query->where('luastanah','like',"%{$request->luastanah}%");
            })->when($request->jumlahlantai, function ($query) use ($request) {
                $query->where('jumlahlantai','like',"%{$request->jumlahlantai}%");
            })->when($request->tinggibangunan, function ($query) use ($request) {
                $query->where('tinggibangunan','like',"%{$request->tinggibangunan}%");
            })->when($request->koefisiendasarbangunan, function ($query) use ($request) {
                $query->where('koefisiendasarbangunan','like',"%{$request->koefisiendasarbangunan}%");
            })->when($request->imb, function ($query) use ($request) {
                $query->where('imb','like',"%{$request->imb}%");
            })->when($request->gsj, function ($query) use ($request) {
                $query->where('gsj','like',"%{$request->gsj}%");
            })->when($request->gsb, function ($query) use ($request) {
                $query->where('gsb','like',"%{$request->gsb}%");
            })->when($request->gss, function ($query) use ($request) {
                $query->where('gss','like',"%{$request->gss}%");
            })->when($request->kdb, function ($query) use ($request) {
                $query->where('kdb','like',"%{$request->kdb}%");
            })->count(); 
    
            $status = StatusBangunan::pluck('nama','statusid');
            return view('showmap',compact('buildings','status','jumlah'));
        }
        
    }
}
