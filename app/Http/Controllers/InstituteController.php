<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\Module;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
                return redirect()->back()->with('success','Logged in successfully');
            }
        }
        return redirect()->back()->with('error',"Credentials does not matched");
    }
    public function register(Request $request){
        $rules = [
            'institute_name' => 'required',
            'teacher_id' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
        $this->validate($request,$rules);
        $data = $request->except('_token','password_confirmation');
        $data['password'] = \Hash::make($request->password);
        $data['role'] = "teacher";
        $data['created_at'] = Carbon::now();
        User::insert($data );
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
        $pdfName = time().'.'.$request->pdf->extension();
        $request->pdf->move(public_path('pdfs'),$pdfName);
        $data['pdf'] = $pdfName;
        Module::insert($data);
        return redirect()->back()->with('success','Module Inserted Successfully');
    }
}
