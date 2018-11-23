<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regional;
use App\Building;
use App\StatusBangunan;
use App\Kelurahan;
use App\Kecamatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class RegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $regionals = Regional::when($request->rt, function ($query) use ($request) {
                $query->where('rt', 'like', "%{$request->rt}%");
            })->when($request->rw, function ($query) use ($request) {
                $query->where('rw', 'like', "%{$request->rw}%");
            })->whereHas('kelurahans', function ($query) use ($request) {
                $query->where('nama', 'like',"%{$request->kelurahan}%");
            })->whereHas('kecamatans', function ($query) use ($request) {
                $query->where('nama', 'like',"%{$request->kecamatan}%");
            })->sortable()->paginate(24); 

            $regionals->appends($request->only('keyword'));
            $kelurahans = Kelurahan::all();
            $kecamatans = Kecamatan::pluck("nama","kecamatanid");

            return view('dashboard',compact('regionals','kelurahans','kecamatans'));
        }
    }

    public function myformAjax($id)
    {

        $kelurahans = Kelurahan::where("kecamatanid",$id)->pluck("nama","kelurahanid");;

        return json_encode($kelurahans);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'rw' => 'required',
            'rt' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
        ]);
        
        $cek=0;
        $regional = Regional::all();
        foreach($regional as $data)
        {
            if($data->rt==$request->rt && $data->rw==$request->rw){
                $cek=1;
            }
        }

        if($cek==0)
        {
            $regionals = new Regional;
            $regionals->rw=$request->get('rw');
            $regionals->rt=$request->get('rt');
            $regionals->kelurahan=$request->get('kelurahan');
            $regionals->kecamatan=$request->get('kecamatan');
            $regionals->save();
        }
        
        return redirect()->route('indexadmin');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'rw' => 'required',
            'rt' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
        ]);

        $regionals = Regional::find($id);
        $regionals->rw=$request->get('rw');
        $regionals->rt=$request->get('rt');
        $regionals->kelurahan=$request->get('kelurahan');
        $regionals->kecamatan=$request->get('kecamatan');
        $regionals->save();

        return redirect()->route('indexadmin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Regional::find($id)->delete();
        return redirect()->route('indexadmin');
    }

    public function loadModal($id)
    {
        $regionals = Regional::find($id);
        $kecamatans = Kecamatan::pluck("nama","kecamatanid");
        return view('detailregion',compact('regionals','kecamatans'));
    }

    public function showBuildings(Request $request,$id)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $regionals = Regional::find($id);
            $buildings = Building::where('regionid',$id)->when($request->nama, function ($query) use ($request) {
                $query->where('namapemilik', 'like', "%{$request->nama}%");
            })->when($request->fungsi, function ($query) use ($request) {
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
            })->sortable()->paginate(24); 
            $status = StatusBangunan::pluck('nama','statusid');
            return view('showbuildings',compact('regionals','buildings','status'));
        }
    }
}
