<?php

namespace App\Http\Controllers;

use App\Models\AppliedModule;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                }if($user->role == "teacher") {
                    $request->session()->put('user', $user);
                    Auth::login($user);
                    return redirect(route('institute'));
                }if($user->role == "admin") {
                    $request->session()->put('user', $user);
                    Auth::login($user);
                    return redirect(route('admin.profile'));
                }
                else{
                    return redirect(route('welcome'));
                }
            }
        }
        return redirect()->back()->with('error',"Credentials does not matched");
    }
    public function editProfile(){
        $user = User::find(Auth::user()->id);
        $settings = Setting::all();
        $settings = $settings->keyBy('key');
        return view("student.edit_profile",compact('user','settings'));
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function profile(){
        $settings = Setting::all();
        $settings = $settings->keyBy('key');
        $applied_modules = AppliedModule::where('student_id', Auth::user()->id)->get();
        /*echo "<pre>";
        print_r($applied_modules[0]->module->name);
        echo "</pre>";
        exit();*/
        return view("student.profile",compact('settings','applied_modules'));
    }
    public function updateProfile(Request $request){
        $user = User::where('id',Auth::user()->id)->first();
        $rules = [
            'name' => 'required|min:3|max:50',
            'email' => 'required',
        ];
        $this->validate($request,$rules);
        $data = $request->except('_token','password_confirmation','password','id_photo');
        if($request->id_photo != null) {
            @unlink(public_path('images/'.$user->id_photo));
            $imageName = time() . '.' . $request->id_photo->extension();
            $request->id_photo->move(public_path('images'), $imageName);
            $data['id_photo'] = $imageName;
        }
        if($request->pasword != null) {
            $data['password'] = \Hash::make($request->password);
        }
        $data['updated_at'] = Carbon::now();
        User::where('id',Auth::user()->id)->update($data);
        return redirect(route('student.profile'))->with('success','Student data has been updated');
    }
    public function moduleApply(Request $request,$id){
        AppliedModule::insert([
            'module_id' => $id,
            'student_id' => Auth::user()->id,
            'status' => 'pending',
        ]);
        return redirect()->back()->with('success','Successfully Applied for the module');
    }
    public function forgetPassword(){
        $settings = Setting::all();
        $settings = $settings->keyBy('key');
        return view('forget_password',compact('settings'));
    }
    public function getUserData(Request $request){
        $user = User::where($request->searchBy,$request->q)->first();
        if($user){
            $user['security_question'] = $user->security_question->question;
            unset($user['security_answer']);
            return json_encode($user);
        }
        else{
            return json_encode("User not found");
        }

    }
    public function resetPassword(Request $request){
        $rules = [
            'password' =>'required|confirmed',
            'security_answer' => 'required'
        ];
        $this->validate($request,$rules);
        $user = User::where('email',$request->email)->first();
        if($user->security_answer == $request->security_answer){
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect(route('institute'))->with('success','Password has been changed successfully');
        }
        else{
            return redirect()->back()->with("error","invalid input");
        }
    }
}
