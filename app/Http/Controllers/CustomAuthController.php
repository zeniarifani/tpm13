<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
    public function Register(request $request){
        $request->validate([
            'name'=>'required',
            'password'=>['required','confirmed','min:8'],
            'binusian'=>'required',
            'leader_name'=>'required',
            'email_leader'=>'required|unique:teams',
            'whatsapp_leader'=>['required','min:9','unique:teams','numeric'],
            'line'=>'required|unique:teams',
            'github'=>'required',
            'birthdate'=>['required','before_or_equal:' . Carbon::today()->subYears(17)->format('Y-m-d')],
            'cv' => 'required|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $fileName=$request->leader_name . '-' . $request->name . '-' . $request->file('cv')->getClientOriginalName();
        $request->file('cv')->storeAs('/public/cv',$fileName);


        $team = new Team();
        $team->name = $request->name;
        $team->password = Hash::make($request->password);
        $team->binusian = $request->binusian;
        $team->leader_name = $request->leader_name;
        $team->email_leader = $request->email_leader;
        $team->whatsapp_leader = $request->whatsapp_leader;
        $team->line = $request->line;
        $team->github=$request->github;
        $team->birthdate=$request->birthdate;
        $team->cv=$request->cv=$fileName;
        $team->user_id = Auth::id();

        $team->save();
        $res = $team;

        if($res){
            $teams = Team::where('user_id', Auth::id())->get();
            return view('dashboard', ['teams' => $teams])->with('success', 'You have registered successfully.');
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
                $teams = Team::where('user_id', Auth::id())->get();
                return view('dashboard',['teams' => $teams]);
            }else{
                return back()->with('fail','Wrong Password.');
            }
        }else {
            return back()->with('fail','This Group Name is not registered.');
        }
    }

}
