<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;


$posts = Post::with('user', 'comments')->get();
dd($posts);

class ProfileController extends Controller
{
    public function showProfile(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::with('user', 'comments')->get();
        return view('My Profile', ['posts' => $posts]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        // Verify if the email is being changed
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Check for profile image and save it
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $path = $file->store('profile_images', 'public'); // Save image to storage

            $user->profile_image = $path;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Delete the user's profile image.
     */
    public function deleteImage(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Delete the profile image if it exists
        if ($user->profile_image) {
            Storage::disk('public')->delete($user->profile_image);
        }

        // Set a default image
        $user->profile_image = 'default_image_path.jpg'; // Update this path to your default image
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-image-deleted');
    }

    /**
     * Display the user's profile.
     */
    public function index(): View
    {
        return view('profile.index', [
            'user' => Auth::user(), // Pass the current user's data to the view
        ]);
    }


}

