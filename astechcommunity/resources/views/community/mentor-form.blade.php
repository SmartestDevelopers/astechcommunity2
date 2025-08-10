@extends('layouts.front')

@section('title', 'Join as Mentor - AS-Tech Community')

@section('content')
<div class="bg-gradient-to-r from-indigo-500 to-indigo-600 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-white mb-4">Join as a Mentor</h1>
            <p class="text-xl text-indigo-100">Share your expertise and guide the next generation of professionals</p>
        </div>
    </div>
  </div>

  <div class="max-w-4xl md:mx-auto mx-3 p-6 md:my-12 md:mb-12 mb-32 my-3 bg-white shadow-lg rounded-lg">
    <div class="md:mb-6 mb-3">
        <h2 class="text-2xl font-semibold text-gray-800">Submit Your Information (As a Mentor)</h2>
        <div class="border-t-4 border-indigo-500 mt-2 w-10 rounded-full"></div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex items-center gap-2 mb-8 text-center">
        <p class="text-gray-700 text-sm">Already have an account?</p>
        <a class="text-sm font-semibold bg-gradient-to-r from-indigo-500 to-indigo-600 bg-clip-text text-transparent hover:from-indigo-600 hover:to-indigo-700 transition-all duration-300" href="{{ route('mentor.login') }}">Login as Mentor</a>
    </div>

    <form action="{{ route('mentor.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 font-medium">Full Name *</label>
                <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required value="{{ old('name') }}">
            </div>
            <div>
                <label class="block text-gray-600 font-medium">Email Address *</label>
                <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required value="{{ old('email') }}">
            </div>
            <div>
                <label class="block text-gray-600 font-medium">Phone</label>
                <input type="tel" name="phone" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('phone') }}">
            </div>
            <div>
                <label class="block text-gray-600 font-medium">Password *</label>
                <input type="password" name="password" placeholder="Minimum 6 characters" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 font-medium">Profession *</label>
                <input type="text" name="profession" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required value="{{ old('profession') }}">
            </div>
            <div>
                <label class="block text-gray-600 font-medium">Experience (years) *</label>
                <input type="text" name="experience_years" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required value="{{ old('experience_years') }}">
            </div>
        </div>

        <div>
            <label class="block text-gray-600 font-medium">Areas of Expertise *</label>
            <input type="text" name="expertise_areas" placeholder="e.g., Web Development, Cloud, Cybersecurity" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required value="{{ old('expertise_areas') }}">
        </div>

        <div>
            <label class="block text-gray-600 font-medium">Bio *</label>
            <textarea name="bio" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>{{ old('bio') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 font-medium">Education</label>
                <input type="text" name="education" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('education') }}">
            </div>
            <div>
                <label class="block text-gray-600 font-medium">Certifications</label>
                <input type="text" name="certifications" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('certifications') }}">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 font-medium">Availability</label>
                <input type="text" name="availability" placeholder="e.g., Weekends, Evenings" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('availability') }}">
            </div>
            <div>
                <label class="block text-gray-600 font-medium">Mentorship Type</label>
                <input type="text" name="mentorship_type" placeholder="e.g., 1:1, Group, Remote" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('mentorship_type') }}">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 font-medium">Portfolio Link</label>
                <input type="url" name="portfolio_link" placeholder="https://yourportfolio.com" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('portfolio_link') }}">
            </div>
            <div>
                <label class="block text-gray-600 font-medium">LinkedIn</label>
                <input type="url" name="linkedin" placeholder="https://linkedin.com/in/yourprofile" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('linkedin') }}">
            </div>
        </div>

        <div>
            <label class="block text-gray-600 font-medium">Profile Picture</label>
            <input type="file" name="picture" accept="image/*" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <p class="text-sm text-gray-500 mt-1">JPG/PNG, max 2MB</p>
        </div>

        <div class="flex items-center">
            <input id="willing_to_volunteer" name="willing_to_volunteer" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ old('willing_to_volunteer') ? 'checked' : '' }}>
            <label for="willing_to_volunteer" class="ml-2 block text-sm text-gray-700">Willing to volunteer</label>
        </div>

        <div>
            <button type="submit" class="w-full py-3 px-6 font-semibold shadow-lg rounded-lg bg-gradient-to-r from-indigo-500 to-indigo-600 text-white hover:from-indigo-600 hover:to-indigo-700 transition-all">Submit Application</button>
        </div>
    </form>
  </div>
@endsection


