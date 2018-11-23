<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusBangunan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class StatusBangunanController extends Controller
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
            $status=StatusBangunan::paginate(25);

            return view('statusbangunan',compact('status'));
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
        ]);
        
      

        $status = new StatusBangunan;
        $status->nama=$request->get('nama');
        $status->keterangan=$request->get('keterangan');
        $status->save();
    
        
        return redirect()->route('statusbangunan');       
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
        ]);
        
      

        $status = StatusBangunan::find($id);
        $status->nama=$request->get('nama');
        $status->keterangan=$request->get('keterangan');
        $status->save();
    
        
        return redirect()->route('statusbangunan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StatusBangunan::find($id)->delete();
        return redirect()->route('statusbangunan');
    }

    public function loadModal($id)
    {
        $status = StatusBangunan::find($id);
        return view('detailstatus',compact('status'));
    }
}
