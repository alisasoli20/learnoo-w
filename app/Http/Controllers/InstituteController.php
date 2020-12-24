<?php

namespace App\Http\Controllers;

use App\Mail\MeetingMail;
use App\Models\AppliedModule;
use App\Models\Institute;
use App\Models\Meeting;
use App\Models\Module;
use App\Models\Setting;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use MacsiDigital\Zoom\Facades\Zoom;

class InstituteController extends Controller
{
    public function login_register(){
        if(Auth::check()){
            if(Auth::user()->role == "student"){
                return redirect(route('student.profile'));
            }if(Auth::user()->role == "teacher"){
                return redirect(route('institute.profile'));
            }if(Auth::user()->role == "admin"){
                return redirect(route('admin.profile'));
            }
        }
        $settings = Setting::all();
        $settings = $settings->keyBy('key');
        return view('institute.login_register',compact('settings'));
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
        $settings = Setting::all();
        $settings = $settings->keyBy('key');
        $modules = Module::where('teacher_id',Auth::user()->id)->get();
//        echo "<pre>";
//        print_r($modules[0]->applied_module[0]->student);
//        echo "</pre>";
//        exit();
        return view("institute.profile")->with(['subjects'=> $subjects, 'settings' => $settings, 'modules'=> $modules]);
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
        $data['teacher_id'] = Auth::user()->id;
        $pdfName = time().'.'.$request->pdf->extension();
        $request->pdf->move(public_path('pdfs'),$pdfName);
        $data['pdf'] = $pdfName;
        Module::insert($data);
        return redirect()->back()->with('success','Module Inserted Successfully');
    }
    public function editProfile(){
        $user = Auth::user();
        $settings = Setting::all();
        $settings = $settings->keyBy('key');
        return view("institute.edit_profile",compact('user','settings'));
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
    public function createMeeting(){
        $module_id = $_GET['module_id'];
        $student_id = $_GET['student_id'];
        $module = Module::where('id',$module_id)->first();
        $student = User::where('id',$student_id)->first();
        $response = Zoom::user()->find("gnKXMLoxSTSGGIM6xQxtKQ")->meetings()->create([
            "topic" => $module->name,
            "type" => 1,
            "start_time" => Carbon::now()->days(2),
            "duration" => "1"
        ]);
        $meeting = Meeting::create([
            'join_url' => $response->join_url,
            'meeting_id' => $response->id,
            'meeting_password'=> $response->password,
            'teacher_id' => $module->teacher_id,
            'created_at' => Carbon::now()
        ]);
        $user = Zoom::user()->find("gnKXMLoxSTSGGIM6xQxtKQ")->meetings;
        Mail::to($student->email)->send(new MeetingMail($meeting));
        echo json_encode($response->join_url);
        return;
    }
}
