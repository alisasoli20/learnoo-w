<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function profile(){
        $settings = Setting::all();
        $settings = $settings->keyBy('key');
        return view('admin.profile',compact('settings'));
    }
    public function updateSettings(Request $request){
        //dd($request->all());
        if($request->logo != null){
            $setting = Setting::where('key','logo')->first();
            @unlink(public_path('img/'.$setting->value));
            $logo= time().'.'.$request->logo->extension();
            $request->logo->move(public_path('img'), $logo);
            $setting = Setting::updateOrCreate(
                ['key' => 'logo'],
                ['value' => $logo]
            );
        }
        if($request->welcome_page_image != null){
            $setting = Setting::where('key','welcome_page_image')->first();
            @unlink(public_path('img/'.$setting->value));
            $welcome_page_image= time().'.'.$request->welcome_page_image->extension();
            $request->welcome_page_image->move(public_path('img'), $welcome_page_image);
            $setting = Setting::updateOrCreate(
                ['key' => 'welcome_page_image'],
                ['value' => $welcome_page_image]
            );
        }if($request->advertisement_1 != null){
            $setting = Setting::where('key','advertisement_1')->first();
            @unlink(public_path('img/'.$setting->value));
            $advertisement_1= time().'.'.$request->advertisement_1->extension();
            $request->advertisement_1->move(public_path('img'), $advertisement_1);
            $setting = Setting::updateOrCreate(
                ['key' => 'advertisement_1'],
                ['value' => $advertisement_1]
            );
        }if($request->advertisement_2 != null){
            $setting = Setting::where('key','advertisement_2')->first();
            @unlink(public_path('img/'.$setting->value));
            $advertisement_2= time().'.'.$request->advertisement_2->extension();
            $request->advertisement_2->move(public_path('img'), $advertisement_2);
            $setting = Setting::updateOrCreate(
                ['key' => 'advertisement_2'],
                ['value' => $advertisement_2]
            );
        }if($request->advertisement_3 != null){
            $setting = Setting::where('key','advertisement_3')->first();
            @unlink(public_path('img/'.$setting->value));
            $advertisement_3= time().'.'.$request->advertisement_3->extension();
            $request->advertisement_3->move(public_path('img'), $advertisement_3);
            $setting = Setting::updateOrCreate(
                ['key' => 'advertisement_3'],
                ['value' => $advertisement_3]
            );
        }if($request->advertisement_4 != null){
            $setting = Setting::where('key','advertisement_4')->first();
            @unlink(public_path('img/'.$setting->value));
            $advertisement_4= time().'.'.$request->advertisement_4->extension();
            $request->advertisement_4->move(public_path('img'), $advertisement_4);
            $setting = Setting::updateOrCreate(
                ['key' => 'advertisement_4'],
                ['value' => $advertisement_4]
            );
        }if($request->advertisement_5 != null){
            $setting = Setting::where('key','advertisement_5')->first();
            @unlink(public_path('img/'.$setting->value));
            $advertisement_5= time().'.'.$request->advertisement_5->extension();
            $request->advertisement_5->move(public_path('img'), $advertisement_5);
            $setting = Setting::updateOrCreate(
                ['key' => 'advertisement_5'],
                ['value' => $advertisement_5]
            );
        }if($request->advertisement_6 != null){
            $setting = Setting::where('key','advertisement_6')->first();
            @unlink(public_path('img/'.$setting->value));
            $advertisement_6= time().'.'.$request->advertisement_6->extension();
            $request->advertisement_6->move(public_path('img'), $advertisement_6);
            $setting = Setting::updateOrCreate(
                ['key' => 'advertisement_6'],
                ['value' => $advertisement_6]
            );
        }if($request->partner_1 != null){
            $setting = Setting::where('key','partner_1')->first();
            @unlink(public_path('img/'.$setting->value));
            $partner_1= time().'.'.$request->partner_1->extension();
            $request->partner_1->move(public_path('img'), $partner_1);
            $setting = Setting::updateOrCreate(
                ['key' => 'partner_1'],
                ['value' => $partner_1]
            );
        }if($request->partner_2 != null){
            $setting = Setting::where('key','partner_2')->first();
            @unlink(public_path('img/'.$setting->value));
            $partner_2= time().'.'.$request->partner_2->extension();
            $request->partner_2->move(public_path('img'), $partner_2);
            $setting = Setting::updateOrCreate(
                ['key' => 'partner_2'],
                ['value' => $partner_2]
            );
        }if($request->partner_3 != null){
            $setting = Setting::where('key','partner_3')->first();
            @unlink(public_path('img/'.$setting->value));
            $partner_3= time().'.'.$request->partner_3->extension();
            $request->partner_3->move(public_path('img'), $partner_3);
            $setting = Setting::updateOrCreate(
                ['key' => 'partner_3'],
                ['value' => $partner_3]
            );
        }
        return redirect(route('admin.profile'));
    }
    public function getUserData(Request $request){
        $user = User::where("email", "alisasoli20@gmail.com");
       /* if($request->searchBy === "email"){
            $user = User::where("email", "alisasoli20@gmail.com");
            echo json_encode($user);
        }
        else if($request->searchBy === "id"){
            $user = User::where('id',$request-q);
            echo json_encode($user);
        }*/
        //$user = User::where($request->searchBy, $request->q)->first;

        return json_encode($user);
    }
}
