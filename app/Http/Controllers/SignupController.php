<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use App\Models\MobileVerification;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class SignupController extends Controller
{
    // Send OTP
    public function sendOtp(Request $request)
    {
        $data = $request->validate([
            'mobile' => ['required', 'string', 'max:50']
        ]);

        $mobile = $data['mobile'];

        $last = MobileVerification::where('mobile', $mobile)->orderBy('created_at', 'desc')->first();
        if ($last && $last->created_at->diffInSeconds(now()) < 60) {
            return back()->withErrors(['mobile' => 'Please wait before requesting another OTP.']);
        }

        $otp = random_int(100000, 999999);
        $expires = Carbon::now()->addMinutes(10);

        MobileVerification::create([
            'mobile' => $mobile,
            'otp' => (string) $otp,
            'expires_at' => $expires,
            'used' => false
        ]);

        session(['signup_mobile' => $mobile]);

        // Log OTP for now (later integrate SMS)
        \Log::info("OTP for {$mobile}: {$otp}");

        return redirect('/verify-otp')->with('status', 'OTP sent to ' . $mobile);
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $data = $request->validate(['otp' => 'required|digits:6']);

        $mobile = session('signup_mobile');
        if (!$mobile) return redirect('/verify-mobile')->withErrors('Session expired.');

        $record = MobileVerification::where('mobile', $mobile)->where('used', false)
            ->orderBy('created_at', 'desc')->first();

        if (!$record) return back()->withErrors(['otp' => 'No OTP found. Request a new one.']);
        if (now()->greaterThan($record->expires_at)) return back()->withErrors(['otp' => 'OTP expired.']);
        if ($record->otp !== $data['otp']) return back()->withErrors(['otp' => 'Invalid OTP.']);

        $record->update(['used' => true]);

        $user = User::firstOrCreate(['mobile' => $mobile]);
        session(['signup_user_id' => $user->id]);

        return redirect('/tell-us-about-yourself');
    }

    // Save personal details
    public function savePersonal(Request $request)
    {
        $userId = session('signup_user_id');
        if (!$userId) return redirect('/verify-mobile')->withErrors('Session expired.');

        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'date_of_birth' => 'nullable|date',
            'gender' => ['nullable', Rule::in(['Male', 'Female', 'Other'])],
            'id_type' => ['nullable', Rule::in(['SA ID', 'Passport', 'Asylum/Refugee Document'])],
            'id_number' => 'nullable|string|max:255',
            'country_of_issue' => 'nullable|string|max:255'
        ]);

        User::where('id', $userId)->update($data);
        return redirect('/where-do-you-live');
    }

    // Save address
    public function saveAddress(Request $request)
    {
        $userId = session('signup_user_id');
        if (!$userId) return redirect('/verify-mobile')->withErrors('Session expired.');

        $data = $request->validate([
            'street' => 'nullable|string|max:255',
            'suburb' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'province' => 'nullable|string|max:100'
        ]);

        User::where('id', $userId)->update($data);
        return redirect('/contact-and-employment-details');
    }

    // Save contact and employment
    public function saveContact(Request $request)
    {
        $userId = session('signup_user_id');
        if (!$userId) return redirect('/verify-mobile')->withErrors('Session expired.');

        $data = $request->validate([
            'email' => 'nullable|email|max:255',
            'employer' => 'required|string|max:255'
        ]);

        User::where('id', $userId)->update($data);
        return redirect('/upload-your-documents');
    }

    // Upload documents
    public function uploadDocs(Request $request)
    {
        $userId = session('signup_user_id');
        if (!$userId) return redirect('/verify-mobile')->withErrors('Session expired.');

        $user = User::findOrFail($userId);

        $request->validate([
            'id_image' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'proof_of_address' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'work_permit' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $files = [
            'id_image' => 'id',
            'proof_of_address' => 'proof_of_address',
            'work_permit' => 'work_permit'
        ];

        foreach ($files as $input => $type) {
            if ($request->hasFile($input)) {
                $file = $request->file($input);
                $path = $file->store("user_documents/{$user->id}", 'public');

                Document::create([
                    'user_id' => $user->id,
                    'type' => $type,
                    'path' => $path
                ]);
            }
        }

        $user->update(['is_verified' => true]);
        session()->forget(['signup_user_id', 'signup_mobile']);

        return redirect('/signup-success');
    }
}
