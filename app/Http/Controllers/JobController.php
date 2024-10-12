<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;

use Auth;

class JobController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => ['required','email'],
            'title' => ['required','string','max:255'],
            'location' => ['required','string','max:255'],
            'description' => ['required','string'],
            'featured_image' => ['nullable','image','mimes:jpg,jpeg,png','max:2048'], // Optional image validation
        ]);

        // Handle file upload for the featured image
        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('images', 'public');
        }

        // Save the job to the database
        Job::create([
            'user_id' => Auth::id(),
            'email' => $request['email'],
            'title' => $request['title'],
            'location' => $request['location'],
            'description' => $request['description'],
            'featured_image' => $imagePath,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Job posted successfully!');
        
    }


    public function index()
    {
        $jobs = Job::all();
        $user = Auth::user();
        return view('index', compact('jobs' ,'user'));
    }
    public function apply($job_id)
    {
        $job = Job::findOrFail($job_id);
        $user = Auth::user();
        return view('application', compact('job', 'user'));
    }
}