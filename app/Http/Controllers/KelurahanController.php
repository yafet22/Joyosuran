<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan;
use App\Kecamatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $kelurahans=Kelurahan::paginate(25);
            $kecamatans = Kecamatan::all();
        
            return view('kelurahan',compact('kelurahans','kecamatans'));
        }
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
            'nama' => 'required',
            'keterangan' => 'required',
            'kecamatanid' => 'required',
            'nokelurahan' => 'required',
        ]);
        
      

        $kelurahans = new Kelurahan;
        $kelurahans->nama=$request->get('nama');
        $kelurahans->keterangan=$request->get('keterangan');
        $kelurahans->kecamatanid=$request->get('kecamatanid');
        $kelurahans->nokelurahan=$request->get('nokelurahan');
        $kelurahans->save();
    
        
        return redirect()->route('kelurahan');  
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
            'nama' => 'required',
            'keterangan' => 'required',
            'kecamatanid' => 'required',
            'nokelurahan' => 'required',
        ]);
        
      

        $kelurahans = Kelurahan::find($id);
        $kelurahans->nama=$request->get('nama');
        $kelurahans->keterangan=$request->get('keterangan');
        $kelurahans->kecamatanid=$request->get('kecamatanid');
        $kelurahans->nokelurahan=$request->get('nokelurahan');
        $kelurahans->save();
        
        return redirect()->route('kelurahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelurahan::find($id)->delete();
        return redirect()->route('kelurahan');
    }

    public function loadModal($id)
    {
        $kelurahans = Kelurahan::find($id);
        $datas = Kecamatan::pluck('nama','kecamatanid');

        return view('detailkelurahan',compact('kelurahans','datas'));
    }
}
