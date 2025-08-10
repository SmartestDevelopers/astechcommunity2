@extends('layouts.front')

@section('title', 'Join as Client - AS-Tech Community')

@section('content')
<!-- Page Header -->
<div class="bg-gradient-to-r from-green-500 to-green-600 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-white mb-4">Join as a Client</h1>
            <p class="text-xl text-green-100">Get your projects done with ease by connecting with expert professionals</p>
        </div>
    </div>
</div>

<div class="max-w-4xl md:mx-auto mx-3 p-6 md:my-12 md:mb-12 mb-32 my-3 bg-white shadow-lg rounded-lg">
    <div class="md:mb-6 mb-3">
        <h2 class="text-2xl font-semibold text-gray-800">Submit Your Information (As a Client)</h2>
        <div class="border-t-4 border-green-500 mt-2 w-10 rounded-full"></div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Messages -->
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
        <a class="text-sm font-semibold bg-gradient-to-r from-green-500 to-green-600 bg-clip-text text-transparent hover:from-green-600 hover:to-green-700 transition-all duration-300" href="{{ route('client.login') }}">Login as Client</a>
    </div>

    <form action="{{ route('client.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Name -->
        <div>
            <label class="block text-gray-600 font-medium">Full Name:</label>
            <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required value="{{ old('name') }}">
        </div>

        <!-- Email & Password -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 font-medium">Email Address:</label>
                <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required value="{{ old('email') }}">
            </div>
            <div class="relative">
                <label class="block text-gray-600 font-medium">Password:</label>
                <input type="password" name="password" placeholder="Minimum 6 characters" class="w-full p-3 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <div class="absolute top-9 right-3 cursor-pointer text-gray-500" onclick="togglePassword('password')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Phone & Company -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 font-medium">Phone Number:</label>
                <input type="tel" name="phone" placeholder="e.g., +1234567890" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('phone') }}">
            </div>
            <div>
                <label class="block text-gray-600 font-medium">Company Name:</label>
                <input type="text" name="company_name" placeholder="Your company name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('company_name') }}">
            </div>
        </div>

        <!-- Industry & Region -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 font-medium">Industry:</label>
                <select name="industry" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Select Industry</option>
                    <option value="Technology" {{ old('industry') == 'Technology' ? 'selected' : '' }}>Technology</option>
                    <option value="Healthcare" {{ old('industry') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                    <option value="Finance" {{ old('industry') == 'Finance' ? 'selected' : '' }}>Finance</option>
                    <option value="Education" {{ old('industry') == 'Education' ? 'selected' : '' }}>Education</option>
                    <option value="E-commerce" {{ old('industry') == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                    <option value="Marketing" {{ old('industry') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                    <option value="Real Estate" {{ old('industry') == 'Real Estate' ? 'selected' : '' }}>Real Estate</option>
                    <option value="Manufacturing" {{ old('industry') == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                    <option value="Other" {{ old('industry') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-600 font-medium">Region/Country:</label>
                <select name="region" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Select Region</option>
                    <option value="Pakistan" {{ old('region') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                    <option value="India" {{ old('region') == 'India' ? 'selected' : '' }}>India</option>
                    <option value="USA" {{ old('region') == 'USA' ? 'selected' : '' }}>United States</option>
                    <option value="UK" {{ old('region') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="Canada" {{ old('region') == 'Canada' ? 'selected' : '' }}>Canada</option>
                    <option value="Australia" {{ old('region') == 'Australia' ? 'selected' : '' }}>Australia</option>
                    <option value="UAE" {{ old('region') == 'UAE' ? 'selected' : '' }}>UAE</option>
                    <option value="Other" {{ old('region') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
        </div>

        <!-- Project Description -->
        <div>
            <label class="block text-gray-600 font-medium">Project Description:</label>
            <textarea name="project_description" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" rows="4" placeholder="Describe your project needs, goals, and requirements...">{{ old('project_description') }}</textarea>
        </div>

        <!-- Budget & Timeline -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 font-medium">Budget Range:</label>
                <select name="budget_range" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Select Budget Range</option>
                    <option value="$500 - $1,000" {{ old('budget_range') == '$500 - $1,000' ? 'selected' : '' }}>$500 - $1,000</option>
                    <option value="$1,000 - $5,000" {{ old('budget_range') == '$1,000 - $5,000' ? 'selected' : '' }}>$1,000 - $5,000</option>
                    <option value="$5,000 - $10,000" {{ old('budget_range') == '$5,000 - $10,000' ? 'selected' : '' }}>$5,000 - $10,000</option>
                    <option value="$10,000 - $25,000" {{ old('budget_range') == '$10,000 - $25,000' ? 'selected' : '' }}>$10,000 - $25,000</option>
                    <option value="$25,000+" {{ old('budget_range') == '$25,000+' ? 'selected' : '' }}>$25,000+</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-600 font-medium">Expected Timeline:</label>
                <select name="timeline" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Select Timeline</option>
                    <option value="1-2 weeks" {{ old('timeline') == '1-2 weeks' ? 'selected' : '' }}>1-2 weeks</option>
                    <option value="3-4 weeks" {{ old('timeline') == '3-4 weeks' ? 'selected' : '' }}>3-4 weeks</option>
                    <option value="1-2 months" {{ old('timeline') == '1-2 months' ? 'selected' : '' }}>1-2 months</option>
                    <option value="3-6 months" {{ old('timeline') == '3-6 months' ? 'selected' : '' }}>3-6 months</option>
                    <option value="6+ months" {{ old('timeline') == '6+ months' ? 'selected' : '' }}>6+ months</option>
                </select>
            </div>
        </div>

        <!-- Required Skills -->
        <div>
            <label class="block text-gray-600 font-medium">Required Skills (comma-separated):</label>
            <input type="text" name="required_skills" placeholder="e.g., PHP, Laravel, JavaScript, MySQL" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('required_skills') }}">
        </div>

        <!-- Website & LinkedIn -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 font-medium">Website URL:</label>
                <input type="url" name="website" placeholder="https://yourwebsite.com" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('website') }}">
            </div>
            <div>
                <label class="block text-gray-600 font-medium">LinkedIn Profile:</label>
                <input type="url" name="linkedin" placeholder="https://linkedin.com/in/yourprofile" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('linkedin') }}">
            </div>
        </div>

        <button type="submit" class="w-full py-3 px-6 font-semibold shadow-lg rounded-lg bg-gradient-to-r from-green-500 to-green-600 text-white hover:from-green-600 hover:to-green-700 transition-all">Submit Application</button>
    </form>
</div>

<script>
    function togglePassword(fieldName) {
        const passwordField = document.querySelector(`input[name="${fieldName}"]`);
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    }
</script>
@endsection
