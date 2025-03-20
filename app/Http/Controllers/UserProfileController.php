<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Ensure the user has a profile
        if (!$user->profile) {
            $user->profile()->create();
        }

        $profile = $user->profile;

        return view('user.profile.index', compact('profile'));
    }

    public function edit()
    {
        $user = Auth::user();
        // Ensure the user has a profile
        if (!$user->profile) {
            $user->profile()->create();
        }

        $profile = $user->profile;
        return view('user.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'address' => 'nullable|string|max:255',
            'social_link' => 'nullable|url',
            'birthday' => 'nullable|date',
            'blood_group' => 'nullable|string|max:3',
        ]);

        $user = Auth::user();
        $profile = $user->profile()->firstOrCreate(['user_id' => $user->id]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $profile->image = $imagePath;
        }

        $profile->address = $request->address;
        $profile->social_link = $request->social_link;
        $profile->birthday = $request->birthday;
        $profile->blood_group = $request->blood_group;
        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}
