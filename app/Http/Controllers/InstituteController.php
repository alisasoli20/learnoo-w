<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\Module;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstituteController extends Controller
{
    public function login_register(){
        return view('institute.login_register');
    }
    public function login(Request $request){
        $rules =[
            'email' => 'required',
            'password' => 'required'
        ];
        $this->validate($request,$rules);
        $user = User::where('email',$request->email)->first();
        if($user){
            if(\Hash::check($request->password, $user->password)){
                $request->session()->put('user',$user);
                Auth::login($user);
                return redirect('institute/profile');
            }
        }
        return redirect()->back()->with('error',"Credentials does not matched");
    }
    public function register(Request $request){
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
        $data['role'] = "teacher";
        $data['created_at'] = Carbon::now();
        User::insert($data);
        return redirect()->back()->with('success','Institute has been registered Successfully');
    }
    public function profile(){
        $subjects = Subject::all();
        return view("institute.profile")->with(['subjects'=> $subjects]);
    }
    public function insertModule(Request $request){
        $rules = [
            'name' => 'required',
            'subject' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'pdf' => 'required'
        ];
        $this->validate($request,$rules);
        $data = $request->except('_token');
        $data['institute_name'] = Auth::user()->institute_name;
        $pdfName = time().'.'.$request->pdf->extension();
        $request->pdf->move(public_path('pdfs'),$pdfName);
        $data['pdf'] = $pdfName;
        Module::insert($data);
        return redirect()->back()->with('success','Module Inserted Successfully');
    }
    public function editProfile(){
        $user = Auth::user();
        return view("institute.edit_profile",compact('user'));
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
        return redirect('institute.profile');
    }
}
