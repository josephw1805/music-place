<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUpload;

    public function index()
    {
        return view('frontend.student-dashboard.profile.index');
    }

    public function edit(User $user)
    {
        return view('frontend.student-dashboard.profile.edit', compact('user'));
    }

    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = User::findOrFail(Auth::user()->id);

        // update avatar
        if ($request->hasFile('avatar')) {
            $avatarPath = $this->uploadFile($request->file('avatar'));
            $user->image = $avatarPath;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->headline = $request->headline;
        $user->gender = $request->gender;
        $user->facebook = $request->facebook;
        $user->x = $request->x;
        $user->instagram = $request->instagram;
        $user->website = $request->website;
        $user->save();

        return redirect()->back();
    }

    public function updatePassword(PasswordUpdateRequest $request): RedirectResponse
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back();
    }
}
