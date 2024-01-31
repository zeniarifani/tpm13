<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Hash;
class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function registration(){
        return view("auth.registration");
    }
    public function registerTeam(request $request){
        $request->validate([
            'name'=>'required',
            'password'=>'required|min:8'
        ]);
        $team = new Team();
        $team->name = $request->name;
        $team->password = Hash::make($request->password);
        $team->save();
        $res = $team;
        if($res){
            return back()->with('success','You have registered succesfully.');
        }else{
            return  back()->with('fail','something wrong');
        }
    }
    public function loginTeam(Request $request)
    {
        $request->validate([
        'name'=>'required',
        'password'=>'required|min:8'
        ]);
    }

}
