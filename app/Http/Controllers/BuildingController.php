<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;
use App\Regional;
use App\StatusBangunan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::sortable()->paginate(8); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

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
            'regionid' => 'required',
            'nobangunan' => 'required',
            'namapemilik' => 'required',
            'fungsibangunan'  => 'required',
            'statusbangunan' => 'required',
            'statustanah' => 'required',
            'luastanah' => 'required',
            'jumlahlantai' => 'required',
            'tinggibangunan' => 'required',
            'koefisiendasarbangunan' => 'required',
            'imb' => 'required',
        ]);
        
        $buildings = new Building;

        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $buildings->foto=$name;
        }

        $buildings->regionid=$request->get('regionid');
        $buildings->nobangunan=$request->get('nobangunan');
        $buildings->namapemilik=$request->get('namapemilik');
        $buildings->fungsibangunan=$request->get('fungsibangunan');
        $buildings->statusbangunan=$request->get('statusbangunan');
        $buildings->statustanah=$request->get('statustanah');
        $buildings->luastanah=$request->get('luastanah');
        $buildings->jumlahlantai=$request->get('jumlahlantai');
        $buildings->tinggibangunan=$request->get('tinggibangunan');
        $buildings->koefisiendasarbangunan=$request->get('koefisiendasarbangunan');
        $buildings->imb=$request->get('imb');
        $buildings->gsj=$request->get('gsj');
        $buildings->gsb=$request->get('gsb');
        $buildings->gss=$request->get('gss');
        $buildings->kdb=$request->get('kdb');
        $buildings->latitude=$request->get('latitude');
        $buildings->longitude=$request->get('longitude');
        $buildings->save();

        return redirect()->route('showBuildings', ['id' => $buildings->regionid]);
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
            'regionid' => 'required',
            'nobangunan' => 'required',
            'namapemilik' => 'required',
            'fungsibangunan'  => 'required',
            'statusbangunan' => 'required',
            'statustanah' => 'required',
            'luastanah' => 'required',
            'jumlahlantai' => 'required',
            'tinggibangunan' => 'required',
            'koefisiendasarbangunan' => 'required',
            'imb' => 'required',
        ]);

        $buildings = Building::find($id);

        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $buildings->foto=$name;
        }

        $buildings->regionid=$request->get('regionid');
        $buildings->nobangunan=$request->get('nobangunan');
        $buildings->namapemilik=$request->get('namapemilik');
        $buildings->fungsibangunan=$request->get('fungsibangunan');
        $buildings->statusbangunan=$request->get('statusbangunan');
        $buildings->statustanah=$request->get('statustanah');
        $buildings->luastanah=$request->get('luastanah');
        $buildings->jumlahlantai=$request->get('jumlahlantai');
        $buildings->tinggibangunan=$request->get('tinggibangunan');
        $buildings->koefisiendasarbangunan=$request->get('koefisiendasarbangunan');
        $buildings->imb=$request->get('imb');
        $buildings->gsj=$request->get('gsj');
        $buildings->gsb=$request->get('gsb');
        $buildings->gss=$request->get('gss');
        $buildings->kdb=$request->get('kdb');
        $buildings->latitude=$request->get('latitude');
        $buildings->longitude=$request->get('longitude');
        $buildings->save();

        return redirect()->route('showBuildings', ['id' => $buildings->regionid]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buildings= Building::find($id);
        Building::find($id)->delete();
        return redirect()->route('showBuildings', ['id' => $buildings->regionid]);
    }

    public function loadModal($id)
    {
        $buildings = Building::find($id);
        $status = StatusBangunan::pluck('nama','statusid');
        return view('detailbuilding',compact('buildings','status'));
    }

    public function getJumlahStatus(){
        $Hunian = Building::where('fungsibangunan','hunian')->count();
        $keagamaan = Building::where('fungsibangunan','keagamaan')->count();
        $usaha = Building::where('fungsibangunan','usaha')->count();
        $sosial_budaya = Building::where('fungsibangunan','sosial-budaya')->count();
        $khusus = Building::where('fungsibangunan','khusus')->count();

        $shm = Building::where('statustanah','SHM')->count();
        $shp = Building::where('statustanah','SHP')->count();
        $hgb = Building::where('statustanah','HGB')->count();
        $lain = Building::where('statustanah','Lain-lain')->count();

        $luas1 = Building::where('luastanah','< 500m2')->count();
        $luas2 = Building::where('luastanah','500 - 5000')->count();
        $luas3 = Building::where('luastanah','> 5000m2')->count();

        $koef1 = Building::where('koefisiendasarbangunan','< 40')->count();
        $koef2 = Building::where('koefisiendasarbangunan','40 - 80')->count();
        $koef3 = Building::where('koefisiendasarbangunan','> 80')->count();

        $imb1 = Building::where('imb','Ada Sesuai')->count();
        $imb2 = Building::where('imb','Ada Tidak Sesuai')->count();
        $imb3 = Building::where('imb','Tidak Ada')->count();

        $status1 = Building::where('statusbangunan','1')->count();
        $status2 = Building::where('statusbangunan','2')->count();

        return view('Infographic', compact('Hunian','keagamaan', 'usaha','sosial_budaya','khusus','shm','shp','hgb','lain','luas1','luas2','luas3','koef1','koef2','koef3','imb1','imb2','imb3','status1','status2'));
    }
}
