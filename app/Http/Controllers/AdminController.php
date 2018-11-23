<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

 

    public function loginPost(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = Admin::where('username',$username)->first();
        if(!is_null($data)){ 
            //apakah email tersebut ada atau tidak
            if($password==$data->password){
                Session::put('id',$data->id);
                Session::put('username',$data->username);
                Session::put('password',$data->password);
                Session::put('login',TRUE);
                return redirect('/regiondata')->with('succes','Anda Berhasil Login');
            }
            else{
                return redirect('/')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('/')->with('alert','Password atau Email, Salah!');
        }
    }

    public function editPost(Request $request){  
        $username = $request->username;
        $password = $request->password;
        $oldpassword = $request->oldpassword;
        $data = Admin::find($request->id);
        if(count($data) > 0){ //apakah email tersebut ada atau tidak
            if($oldpassword==$data->password){
                $data->username=$username;
                $data->password=$password;
                $data->save();
                Session::put('id',$data->id);
                Session::put('username',$data->username);
                Session::put('password',$data->password);
                Session::put('login',TRUE);
                return redirect('/regiondata')->with('succes','Anda Berhasil Edit Account');
            }
            else{
                return redirect('/regiondata')->with('alert','Password atau Username, Salah !');
            }
        }
        else{
            return redirect('/regiondata')->with('alert','Password atau Username, Salah!');
        }
    }
    
    public function logout(){
        Session::flush();
        return redirect('/')->with('alert','Kamu sudah logout');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
