<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use App\Models\MobileVerification;
use App\Models\DocumentType;
use App\Models\IdType;
use App\Models\Gender;
use App\Models\Province;
use App\Models\Country;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class SignupController extends Controller
{
    public function sendOtp (Request $request){
        $data = $request-> validate([
            'mobile' => ['required','string','max:50']
        ]);
        $mobile = $data ['mobile'];

        // $last = MobileVerification::where('mobile',$mobile)->orderBy('created_at','desc')-> first();

        // if($last && $last-> created_at -> diffInSeconds (now()) <60){
        //     return back()-> withErrors (['mobile' => 'Please wait before requesting another OTP.']);
        // } 

        $otp = random_int (100000,999999);
        $expires = Carbon::now()->addMinutes (58);

        MobileVerification:: create ([
            'mobile' => $mobile,
            'otp' => (string)$otp,
            'expires_at' => $expires,
            'used' => false
        ]);
        
        session (['signup_mobile' => $mobile]);

        // \Log::info("otp for {$mobile}: {$otp}");

        return redirect ('/verify-otp')-> with('status','otp sent to:' . $mobile);
       
    }


    public function verifyOtp(Request $request){

        $data = $request -> validate([
            'otp' => 'required | digits:6']);

            $mobile = session('signup_mobile');
            if(!$mobile) return redirect('/verify-otp')->withErrors(['session'=>'Session Expired']);

            $record = MobileVerification::
            where('mobile',$mobile)->where('used',false)
            ->orderBy('created_at','desc')->first();

            if(!$record) 
            return back()->withErrors(['otp' => 'No OTP found. request a new one']);

            // if(now()->greaterThan($record->expires_at)) 
            //     return back()->withErrors(['otp'=>'otp expired.']);

            if($record -> otp !== $data['otp']) 
                return back()->withErrors(['otp'=>'Invalid otp']);
 
            $record->update(['used'=>true]);
            $user= User::firstOrCreate(['mobile'=>$mobile]);

            session(['signup_user_id'=>$user->id]);

            return redirect('/tell-us-about-yourself');


    }


    public function savePersonal(Request $request){
        $userId = session('signup_user_id');
        if(!$userId)
            return redirect('/verify-mobile')->withErrors(['session'=>'Session Expired.']);

        $validId = IdType::pluck('name')->toArray();
        $validGender = Gender::pluck('name')->toArray();
        $data = $request ->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'date_of_birth' => 'nullable|date',
            'gender' => ['nullable', Rule::in($validGender)],
            'id_type' => ['nullable', Rule::in($validId)],
            'id_number' => 'nullable|string|max:255',
            'country_of_issue' => 'nullable|string|max:255'
        ]);

        User::where('id',$userId)->update($data);
        return redirect('/where-do-you-live');

    }

    public function saveAddress(Request $request){
    $userId = session('signup_user_id');
    if(!$userId) 
        return redirect('/verify-mobile')->withErrors(['session'=>'Session Expired.']);

    $validProvince = Province::pluck('id')->toArray();
    $validCountry = Country::pluck('id')->toArray();

    $data = $request ->validate([
        'street' => 'nullable|string|max:255',
        'suburb' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'postal_code' => 'nullable|string|max:255',
        'country' => ['required' , Rule ::in ($validCountry)], //
        'province' => ['required' , Rule::in ($validProvince)]
    ]);

    $country = Country::find($data['country']);    //
    $province = Province::find($data['province']);

    $data['country'] = $country->name;  // 
    $data['province'] = $province->name;


    User::where('id',$userId)->update($data);
    return redirect('/contact-and-employment-details');
}
   


    public function saveContact(Request $request){
        $userId = session('signup_user_id');
        if(!$userId)
        return redirect('/verify-mobile')->withErrors(['session'=>'Session Expired.']);
         $data = $request->validate([
            'email' => 'nullable|email|max:255',
            'employer' => 'required|string|max:255'
        ]);

        User:: where('id',$userId)->update($data);
        return redirect('/upload-your-documents');
    }


    public function uploadDocs(Request $request){
        $userId = session('signup_user_id');

        if(!$userId)
        return redirect('/verify-mobile')->withErrors(['session'=>'Session Expired.']);
        $user = User::findOrFail($userId);
        $request -> validate([
            'id_image' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'proof_of_address' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'work_permit' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120'
        ]);

       $files = [
        'id_image' => 'id',      
        'proof_of_address' => 'proof_of_address',
        'work_permit' => 'work_permit'
       ];

       foreach($files as $input => $type){
        if($request -> hasFile($input)){
            $file = $request->file($input);
            $path =$file ->store("user_documents/{$user->id}",'public');

            $typeId = match ($type)
            {
                'id_image' => 1,
                'proof_of_address' => 2,
                'work_permit' => 3,
                default => null,
            };
            Document::create([
                'user_id' => $user->id,
                'type' => $type,
                'path' => $path,
                'document_type_id' => $typeId
            ]);
        }
       }

       $user ->update(['is_verified' =>true]);
       session()->forget(['signup_user_id','signup_mobile']);
       return redirect ('/signup-success');


        }
}

 