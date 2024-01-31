<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Hash;
use Session;
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
            'password'=>['required','confirmed','min:8'],
            'binusian'=>'required'
        ]);
        $team = new Team();
        $team->name = $request->name;
        $team->password = Hash::make($request->password);
        $team->binusian = $request->binusian;
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
        $team = Team::where('name','=',$request->name)->first();
        if($team){
            if(Hash::check($request->password,$team->password)){
                $request->session()->put('loginId',$team->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','Wrong Password.');
            }
        }else {
            return back()->with('fail','This Group Name is not registered.');
        }
    }
    public function dashboard(){
        return "This is dashboard";
    }

}
