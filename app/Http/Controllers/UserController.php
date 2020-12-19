<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function register(Request $request){
        //dd($request->all());
        $rules = [
            'name' => 'required|min:3|max:50',
            'email' => 'required',
            'password' => 'required|confirmed|min:6',
            'id_photo' => 'required|mimes:jpeg,png,jpg,gif,svg'
        ];
        $this->validate($request,$rules);
        $imageName = time().'.'.$request->id_photo->extension();
        $request->id_photo->move(public_path('images'), $imageName);
        $data = $request->except('_token','password_confirmation');
        $data['id_photo'] = $imageName;
        $data['password'] = \Hash::make($request->password);
        $data['role'] = "student";
        $data['created_at'] = Carbon::now();
        User::insert($data );
        return redirect()->back()->with('success','User has been registered Successfully');
    }
    function login(Request $request){
        $rules =[
            'email' => 'required',
            'password' => 'required'
        ];
        $this->validate($request,$rules);
        $user = User::where('email',$request->email)->first();
        if($user){
            if(\Hash::check($request->password, $user->password)){
                if($user->role == "student") {
                    $request->session()->put('user', $user);
                    Auth::login($user);
                    return redirect(route('dashboard'));
                }else{
                    return redirect(route('welcome'));
                }
            }
        }
        return redirect()->back()->with('error',"Credentials does not matched");
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function profile(){
        return view("student.profile");
    }
}
