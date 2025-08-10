<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FreelancerApplication;
use App\ClientApplication;
use App\MentorApplication;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{
    // Show freelancer registration form
    public function freelancerForm()
    {
        return view('community.freelancer-form');
    }

    // Store freelancer application
    public function storeFreelancer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email|unique:freelancer_applications,email',
            'password' => 'required|min:6',
            'profession' => 'nullable|string',
            'region' => 'nullable|string',
            'about' => 'required|string',
            'portfolio_link' => 'nullable|url',
            'linkedin' => 'nullable|string',
            'fiverr' => 'nullable|string',
            'facebook' => 'nullable|string',
            'upwork' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('picture');
        
        // Handle skills (assuming they come as comma-separated or array)
        if ($request->has('skills')) {
            $skills = is_array($request->skills) ? $request->skills : explode(',', $request->skills);
            $data['skills'] = array_filter($skills);
        }

        // Handle file upload
        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('freelancer-pictures', 'public');
        }

        $data['apply_for_interview'] = $request->has('apply_for_interview');

        FreelancerApplication::create($data);

        return redirect()->back()->with('success', 'Your freelancer application has been submitted successfully! We will review it and get back to you soon.');
    }

    // Show client registration form
    public function clientForm()
    {
        return view('community.client-form');
    }

    // Store client application
    public function storeClient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:client_applications,email',
            'password' => 'required|min:6',
            'phone' => 'nullable|string',
            'company_name' => 'nullable|string',
            'industry' => 'nullable|string',
            'project_description' => 'nullable|string',
            'budget_range' => 'nullable|string',
            'timeline' => 'nullable|string',
            'region' => 'nullable|string',
            'website' => 'nullable|url',
            'linkedin' => 'nullable|string',
        ]);

        $data = $request->all();
        
        // Handle required skills
        if ($request->has('required_skills')) {
            $skills = is_array($request->required_skills) ? $request->required_skills : explode(',', $request->required_skills);
            $data['required_skills'] = array_filter($skills);
        }

        ClientApplication::create($data);

        return redirect()->back()->with('success', 'Your client application has been submitted successfully! We will review it and get back to you soon.');
    }

    // Show mentor registration form
    public function mentorForm()
    {
        return view('community.mentor-form');
    }

    // Store mentor application
    public function storeMentor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:mentor_applications,email',
            'password' => 'required|min:6',
            'phone' => 'nullable|string',
            'profession' => 'required|string',
            'experience_years' => 'required|string',
            'expertise_areas' => 'required|string',
            'bio' => 'required|string',
            'education' => 'nullable|string',
            'certifications' => 'nullable|string',
            'availability' => 'nullable|string',
            'mentorship_type' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'portfolio_link' => 'nullable|url',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('picture');
        
        // Handle file upload
        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('mentor-pictures', 'public');
        }

        $data['willing_to_volunteer'] = $request->has('willing_to_volunteer');

        MentorApplication::create($data);

        return redirect()->back()->with('success', 'Your mentor application has been submitted successfully! We will review it and get back to you soon.');
    }

    // Login forms
    public function freelancerLogin()
    {
        return view('community.freelancer-login');
    }

    public function clientLogin()
    {
        return view('community.client-login');
    }

    public function mentorLogin()
    {
        return view('community.mentor-login');
    }

    // Login authentication (basic implementation)
    public function authenticateFreelancer(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $freelancer = FreelancerApplication::where('email', $request->email)
                                          ->where('status', 'approved')
                                          ->first();

        if ($freelancer && Hash::check($request->password, $freelancer->password)) {
            // Store in session or implement your authentication logic
            session(['freelancer_user' => $freelancer]);
            return redirect()->intended('/freelancer-dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials or account not approved yet.']);
    }

    public function authenticateClient(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $client = ClientApplication::where('email', $request->email)
                                  ->where('status', 'approved')
                                  ->first();

        if ($client && Hash::check($request->password, $client->password)) {
            session(['client_user' => $client]);
            return redirect()->intended('/client-dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials or account not approved yet.']);
    }

    public function authenticateMentor(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $mentor = MentorApplication::where('email', $request->email)
                                  ->where('status', 'approved')
                                  ->first();

        if ($mentor && Hash::check($request->password, $mentor->password)) {
            session(['mentor_user' => $mentor]);
            return redirect()->intended('/mentor-dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials or account not approved yet.']);
    }
}
