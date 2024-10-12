<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App;
use Auth;
use App\Mail\DeclineMail;
use App\Mail\ApproveMail;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function storeApp(Request $request)
    {
        $request->validate([
            'job_id' => ['exists:jobs,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'experince' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15'],
        ]);

        $data = [
            'job_id' => $request->job_id,
            'user_id' => Auth::id(),
            'name' => $request->name,
            'experince' => $request->experince,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ];

        App::create($data);

        return redirect()->back()->with('success', 'Your application has been submitted!');
    }

    public function indexApp()
    {
        $user = Auth::user();
        $applications = App::whereHas('job', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['job', 'user'])->get();

        return view('blog', compact('user', 'applications'));
    }

    
    public function approve($application_id)
    {
        $application = App::findOrFail($application_id);

        Mail::to($application->email)->send(new ApproveMail($application));

        return response()->redirectTo('blog');
    }

    public function decline($application_id)
    {
        $application = App::findOrFail($application_id);

        Mail::to($application->email)->send(new DeclineMail($application));

        return response()->redirectTo('blog');
    }



    
}