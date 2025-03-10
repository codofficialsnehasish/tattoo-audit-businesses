<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\BusinessCategory;
use App\Models\UserBusiness;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function registration(){
        $business_categorys = BusinessCategory::where('is_visible',1)->get();
        return view('site.registration',compact('business_categorys'));
    }

    public function register_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'business_name' => 'required|max:255',
            'business_category' => 'required|exists:business_categories,id',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10|regex:/^[6789]/|unique:users,phone',
            'opt_mobile_no' => 'nullable|digits:10|regex:/^[6789]/',
            'gender' => 'required|in:male,female,others',
            'trade_license_number' => 'nullable',
            'password' => 'required|min:8',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'trade_license_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'nullable|in:1,0'
        ], [
            'profile_image.max' => 'The Profile Image must not be larger than 2 MB.',
            'trade_license_image.max' => 'The Trade License Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $user = new User();
            $user->user_id = generateUniqueId('user');
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->name = $request->first_name.' '.$request->last_name;
            $user->status = $request->status ?? 0;
            $user->date_of_birth = format_date_for_db($request->date_of_birth);
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->opt_mobile_no = $request->opt_mobile_no;
            $user->password = bcrypt($request->password);

            if ($request->hasFile('profile_image')) {
                $user->addMedia($request->file('profile_image'))->toMediaCollection('user-image');
            }

            if ($request->hasFile('trade_license_image')) {
                $user->addMedia($request->file('trade_license_image'))->toMediaCollection('user-trade-licence');
            }

            $user->syncRoles('User');
            $res = $user->save();

            $user_business = UserBusiness::create([
                'user_id' => $user->id,
                'business_name' => $request->business_name,
                'business_category_id' => $request->business_category,
                'trade_license_number' => $request->trade_license_number,
                'business_address' => $request->business_address
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(route('dashboard', absolute: false))->with('success','Registered Successfully');

            // if($res){
            //     return back()->with('success','Registered Successfully');
            // }else{
            //     return back()->with('success','Not Registered');
            // }
        }
    }
}
