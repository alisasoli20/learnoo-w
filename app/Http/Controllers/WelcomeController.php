<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Subject;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke($page)
    {
        // TODO: Implement __invoke() method.
        return view('pages.'.$page);
    }

    function dashboard(){
        $subjects = Subject::all();
        $modules = Module::all();
        return view("dashboard")->with(['subjects' => $subjects, 'modules'=>$modules]);
    }
}
