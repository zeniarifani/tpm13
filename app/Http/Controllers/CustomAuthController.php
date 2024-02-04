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
    public function delete($id){
        Team::destroy($id);
        return redirect(route('admin.showAll'));
    }
    public function update(Request $request, $id){
        $team = Team::findOrFail($id);

        $team->update([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'binusian'=>$request->binusian,
            'leader_name'=>$request->leader_name,
            'email_leader'=>$request->email_leader,
            'whatsapp_leader'=>$request->whatsapp_leader,
            'line'=>$request->line,
            'github'=>$request->github,
            'birthplace'=>$request->birthplace,
            'birthdate'=>$request->birthdate,
            
            
        ]);
        
        $fileName = $team->leader_name . '-' . $team->name . '-' . $request->file('cv')->getClientOriginalName();
        // $fileName2 = $team->leader_name .'-'. $team->name . '-' . $request->file('id_card')->getClientOriginalName();
        
        $team->cv = $fileName;
        $team->id_card = $fileName;

        //id card error jadi cv
        $request->file('cv')->storeAs('/public/cv', $fileName);
        
        return redirect()->route('admin.showAll')->withSuccess('Data Edited');
    }

    public function nodata(){
        return view('nodata');
    }

    public function showAll(){
        $teams = Team::all();
        return view('admin', compact('teams'));
    }

    public function edit($id){
        $team = Team::findOrFail($id);
        return view('editTeam',compact('team'));
    }

    public function login(){
        return view("login");
    }

    public function admin(){
        return view("admin");
    }

    public function forgetpass(){
        return view("forgetpass");
    }

    public function dashboard(){
     
        $teamId = session('loginID');

        if (!$teamId) {
            return redirect()->route('login')->with('fail', 'Please log in first.');
        }

        $team = Team::find($teamId);

        return view("dashboard", compact('team'));
    }

    public function Register(){
        return view("Register");
    }


    public function registerTeam(Request $request){


        
        $team = new Team();
        $team->name = $request->name;
        $team->password = Hash::make($request->password);
        $team->binusian = $request->binusian;
        $team->leader_name = $request->leader_name;
        $team->email_leader = $request->email_leader;
        $team->whatsapp_leader = $request->whatsapp_leader;
        $team->line = $request->line;
        $team->github=$request->github;
        $team->birthplace=$request->birthplace;
        $team->birthdate=$request->birthdate;

  
        session(['user_id' => $team->id]);

        $fileName = $team->leader_name . '-' . $team->name . '-' . $request->file('cv')->getClientOriginalName();
        $fileName2 = $team->leader_name .'-'. $team->name . '-' . $request->file('id_card')->getClientOriginalName();
        
        $team->cv = $fileName;
        $team->id_card = $fileName2;

        //id card error jadi cv
        $request->file('cv')->storeAs('/public/cv', $fileName);
        $request->file('id_card')->storeAs('/public/id_card', $fileName2);
        
        $team->save();

        return redirect()->route('login');

    }

    
    public function loginTeam(Request $request)
    {   

        $team = Team::where('name','=', $request->name)->first();

        if ($team && Hash::check($request->password, $team->password)) {
            $request->session()->put('loginID',$team->id);
            return redirect()->route('dashboard')->withSuccess('Signed In');
        }

        // Login failed
        return redirect()->route('login')->withErrors(['loginError' => 'Invalid username or password']);
    }

    public function search(Request $request)
    {
        $team = Team::where('name','=', $request->name)->first();

        if ($team) {
            $request->session()->put('loginID',$team->id);
            return redirect()->route('dashboard')->withSuccess('Signed In');
        }
        return redirect()->route('nodata')->withErrors(['loginError' => 'Invalid username or password']);

    }
    public function sort(Request $request)
    {
        $teams = Team::query();
    
        if ($request->has('sortButtonClicked')) {
            $teams->orderBy('name', 'asc');
        }
    
        $teams = $teams->get();
    
        return view('admin', compact('teams'));
    }

}
