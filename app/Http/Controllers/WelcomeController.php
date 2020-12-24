<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Setting;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function __invoke($page)
    {
        // TODO: Implement __invoke() method.
        $settings = Setting::all();
        $settings = $settings->keyBy('key');
        return view('pages.'.$page,compact('settings'));
    }
    public function index(){
        $settings = Setting::all();
        $settings = $settings->keyBy('key');
        if(Auth::check()){
            if(Auth::user()->role == "student"){
                return redirect(route('student.profile'));
            }
            if(Auth::user()->role == "teacher"){
                return redirect(route('institute.profile'));
            }
            if(Auth::user()->role == "admin"){
                return redirect(route('admin.profile'));
            }
        }
        $modules = Module::all();
        return view('welcome',compact('modules','settings'));
    }
    function dashboard(){
        $subjects = Subject::all();
        $modules = Module::all();
        $settings = Setting::all();
        $settings = $settings->keyBy('key');
        return view("dashboard")->with(['subjects' => $subjects, 'modules'=>$modules, 'settings' => $settings]);
    }
}
