<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    //
    public function userProfile()
    {
        $user = User::with('profile')->find(auth()->id());

        // dd($user);

        return view('dashboard.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:255',
                'bitcoin_address' => 'nullable|string|max:255',
                'etherium_address' => 'nullable|string|max:255',
                'usdt_address' => 'nullable|string|max:255',
                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Update user details
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            // Update or create profile
            $userProfile = UserProfile::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'address' => $request->address,
                    'bitcoin_address' => $request->bitcoin_address,
                    'etherium_address' => $request->etherium_address,
                    'usdt_address' => $request->usdt_address,
                ]
            );

            // Handle profile picture upload if provided
            if ($request->hasFile('profile_pic')) {
                $file = $request->file('profile_pic');
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $fileName);
                $filePath =  $fileName;
                // Save profile picture path
                $userProfile->update(['profile_pic' => $filePath]);
            }

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    public function updatePassword(Request $request)
    {
        try {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:6|confirmed',
            ]);

            $user = Auth::user();

            // Check if old password matches
            if (!Hash::check($request->old_password, $user->password)) {
                throw ValidationException::withMessages(['old_password' => 'The old password is incorrect.']);
            }

            // Update the password
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->back()->with('success', 'Password updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error',  $e->getMessage());
        }
    }
}
