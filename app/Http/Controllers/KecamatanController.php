<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class KecamatanController extends Controller
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
            $kecamatans=Kecamatan::paginate(25);

            return view('kecamatan',compact('kecamatans'));
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
            'nokecamatan' => 'required',
        ]);
        
      

        $kecamatans = new Kecamatan;
        $kecamatans->nama=$request->get('nama');
        $kecamatans->keterangan=$request->get('keterangan');
        $kecamatans->nokecamatan=$request->get('nokecamatan');
        $kecamatans->save();
    
        
        return redirect()->route('kecamatan');  
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
            'nokecamatan' => 'required',
        ]);
        
      

        $kecamatans = Kecamatan::find($id);
        $kecamatans->nama=$request->get('nama');
        $kecamatans->keterangan=$request->get('keterangan');
        $kecamatans->nokecamatan=$request->get('nokecamatan');
        $kecamatans->save();
    
        
        return redirect()->route('kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kecamatan::find($id)->delete();
        return redirect()->route('kecamatan');
    }

    public function loadModal($id)
    {
        $kecamatans = Kecamatan::find($id);

        return view('detailkecamatan',compact('kecamatans'));
    }
}
