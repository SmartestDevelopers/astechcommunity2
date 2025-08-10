@extends('layouts.front')

@section('title', 'Join as Freelancer - AS-Tech Community')
@section('meta_description', 'Join AS-Tech Community as a freelancer. Showcase your skills globally, set competitive rates, and work on exciting technology projects with top clients.')
@section('meta_keywords', 'freelancer registration, join freelancer, tech freelancer, remote work, freelance developer, freelance designer')

@section('content')
<!-- Professional Page Header -->
<section class="masthead -type-1 js-masthead">
  <div class="masthead__bg">
    <div class="bg-image js-lazy" data-bg="{{ asset('template/img/home-2/masthead/bg.png') }}"></div>
  </div>
  <div class="container">
    <div class="row justify-center text-center">
      <div class="col-xl-8 col-lg-9">
        <div class="masthead__content">
          <h1 class="masthead__title text-white">Join Our Elite Freelancer Network</h1>
          <p class="masthead__text text-white mt-30">Showcase your expertise globally, set competitive rates, and collaborate on cutting-edge technology projects with industry-leading clients.</p>
          <div class="masthead__buttons row x-gap-10 y-gap-10 justify-center pt-30">
            <div class="col-12 col-md-auto">
              <div class="d-flex x-gap-15 y-gap-15 justify-center items-center">
                <div class="text-white">✓ Global Opportunities</div>
                <div class="text-white">✓ Competitive Rates</div>
                <div class="text-white">✓ Professional Growth</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Professional Application Form Section -->
<section class="layout-pt-lg layout-pb-lg">
  <div class="container">
    <div class="row justify-center">
      <div class="col-xl-8 col-lg-10">
        <div class="contactForm -type-1 rounded-8 px-40 py-40 md:px-25 md:py-30 bg-white shadow-4">
          <!-- Form Header -->
          <div class="text-center mb-40">
            <div class="sectionTitle">
              <h2 class="sectionTitle__title">Freelancer Application</h2>
              <div class="sectionTitle__decoration">
                <div style="width: 60px; height: 4px; background: linear-gradient(90deg, #ff6b35 0%, #ff4757 100%); margin: 15px auto; border-radius: 2px;"></div>
              </div>
              <p class="sectionTitle__text mt-10">Join our elite network of technology professionals and work on cutting-edge projects with global clients.</p>
            </div>
            
            <!-- Already have account link -->
            <div class="d-flex justify-center items-center mt-30">
              <span class="text-14 text-dark-1 mr-10">Already have an account?</span>
              <a href="{{ route('freelancer.login') }}" class="button -underline -purple-1 text-purple-1 text-14">Login as Freelancer</a>
            </div>
          </div>

          <!-- Success/Error Messages -->
          @if(session('success'))
            <div class="alert -green mb-30">
              <div class="alert__content">
                <div class="d-flex items-center">
                  <div class="icon-check-circle text-20 mr-10"></div>
                  <div class="text-15">{{ session('success') }}</div>
                </div>
              </div>
            </div>
          @endif

          @if($errors->any())
            <div class="alert -red mb-30">
              <div class="alert__content">
                <div class="d-flex items-start">
                  <div class="icon-alert-circle text-20 mr-10 mt-2"></div>
                  <div>
                    <div class="text-15 fw-500 mb-5">Please correct the following errors:</div>
                    <ul class="text-14">
                      @foreach($errors->all() as $error)
                        <li class="mt-5">{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          @endif

          <!-- Professional Application Form -->
          <form action="{{ route('freelancer.store') }}" method="POST" enctype="multipart/form-data" class="contact-form-to-email">
            @csrf
            
            <div class="row x-gap-30 y-gap-30">
              <!-- Personal Information Section -->
              <div class="col-12">
                <h4 class="text-20 fw-500 text-dark-1 mb-20">Personal Information</h4>
                <div class="border-top-light pt-20"></div>
              </div>
              
              <!-- Full Name -->
              <div class="col-lg-6 col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Full Name *</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your full name" required value="{{ old('name') }}">
              </div>
              
              <!-- Email -->
              <div class="col-lg-6 col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email Address *</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email address" required value="{{ old('email') }}">
              </div>
              
              <!-- Phone -->
              <div class="col-lg-6 col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone Number *</label>
                <input type="tel" name="phone" class="form-control" placeholder="+1 (555) 123-4567" required value="{{ old('phone') }}">
              </div>
              
              <!-- Password -->
              <div class="col-lg-6 col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Password *</label>
                <div class="relative">
                  <input type="password" name="password" id="passwordField" class="form-control" placeholder="Minimum 6 characters" required>
                  <div class="absolute-right-center pr-15 cursor-pointer" onclick="togglePassword()">
                    <i class="icon-eye text-16 text-light-1" id="toggleIcon"></i>
                  </div>
                </div>
              </div>
              
              <!-- Professional Information Section -->
              <div class="col-12">
                <h4 class="text-20 fw-500 text-dark-1 mb-20 mt-40">Professional Information</h4>
                <div class="border-top-light pt-20"></div>
              </div>
              
              <!-- Profession -->
              <div class="col-lg-6 col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Primary Expertise *</label>
                <select name="profession" class="form-control" required>
                  <option value="">Select your primary expertise</option>
                  <option value="Web Developer" {{ old('profession') == 'Web Developer' ? 'selected' : '' }}>Web Developer</option>
                  <option value="Mobile App Developer" {{ old('profession') == 'Mobile App Developer' ? 'selected' : '' }}>Mobile App Developer</option>
                  <option value="UI/UX Designer" {{ old('profession') == 'UI/UX Designer' ? 'selected' : '' }}>UI/UX Designer</option>
                  <option value="Graphic Designer" {{ old('profession') == 'Graphic Designer' ? 'selected' : '' }}>Graphic Designer</option>
                  <option value="Digital Marketer" {{ old('profession') == 'Digital Marketer' ? 'selected' : '' }}>Digital Marketer</option>
                  <option value="Content Writer" {{ old('profession') == 'Content Writer' ? 'selected' : '' }}>Content Writer</option>
                  <option value="Video Editor" {{ old('profession') == 'Video Editor' ? 'selected' : '' }}>Video Editor</option>
                  <option value="Data Analyst" {{ old('profession') == 'Data Analyst' ? 'selected' : '' }}>Data Analyst</option>
                  <option value="Cybersecurity Expert" {{ old('profession') == 'Cybersecurity Expert' ? 'selected' : '' }}>Cybersecurity Expert</option>
                  <option value="Other" {{ old('profession') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
              </div>
              
              <!-- Region -->
              <div class="col-lg-6 col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Location *</label>
                <select name="region" class="form-control" required>
                  <option value="">Select your country/region</option>
                  <option value="Pakistan" {{ old('region') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                  <option value="India" {{ old('region') == 'India' ? 'selected' : '' }}>India</option>
                  <option value="Bangladesh" {{ old('region') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                  <option value="USA" {{ old('region') == 'USA' ? 'selected' : '' }}>United States</option>
                  <option value="UK" {{ old('region') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                  <option value="Canada" {{ old('region') == 'Canada' ? 'selected' : '' }}>Canada</option>
                  <option value="Australia" {{ old('region') == 'Australia' ? 'selected' : '' }}>Australia</option>
                  <option value="Other" {{ old('region') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
              </div>
              
              <!-- Skills Section -->
              <div class="col-12">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Technical Skills</label>
                <div class="skills-container">
                  <div class="row x-gap-10 y-gap-10">
                    <div class="col-lg-8">
                      <select id="skillSelect" class="form-control">
                        <option value="">Select a skill to add</option>
                        <option value="JavaScript">JavaScript</option>
                        <option value="React.js">React.js</option>
                        <option value="Node.js">Node.js</option>
                        <option value="Python">Python</option>
                        <option value="Java">Java</option>
                        <option value="PHP">PHP</option>
                        <option value="UI/UX Design">UI/UX Design</option>
                        <option value="Graphic Design">Graphic Design</option>
                        <option value="SEO Optimization">SEO Optimization</option>
                        <option value="Content Creation">Content Creation</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                        <option value="Social Media Marketing">Social Media Marketing</option>
                        <option value="Cybersecurity Analysis">Cybersecurity Analysis</option>
                        <option value="Cloud Architecture">Cloud Architecture</option>
                        <option value="Database Management">Database Management</option>
                        <option value="Mobile App Development">Mobile App Development</option>
                        <option value="Machine Learning">Machine Learning</option>
                        <option value="Data Analysis">Data Analysis</option>
                        <option value="Video Editing">Video Editing</option>
                        <option value="WordPress">WordPress</option>
                      </select>
                    </div>
                    <div class="col-lg-4">
                      <input type="text" id="customSkill" class="form-control" placeholder="Or type custom skill">
                    </div>
                  </div>
                  
                  <div class="d-flex justify-center mt-15">
                    <button type="button" id="addSkillBtn" class="button -sm -purple-1 text-white">Add Skill</button>
                  </div>
                  
                  <div id="selectedSkills" class="skills-display mt-20">
                    <div class="text-14 text-light-1" id="noSkillsMsg">No skills added yet. Add your key technical skills.</div>
                  </div>
                  
                  <input type="hidden" name="skills" id="skillsInput" value="{{ old('skills') ? json_encode(old('skills')) : '' }}">
                </div>
              </div>
              
              <!-- Professional Summary -->
              <div class="col-12">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Professional Summary *</label>
                <textarea name="about" class="form-control" rows="5" placeholder="Describe your professional background, experience, and what makes you unique as a freelancer. (Minimum 100 characters)" required>{{ old('about') }}</textarea>
              </div>
              
              <!-- Portfolio & Links Section -->
              <div class="col-12">
                <h4 class="text-20 fw-500 text-dark-1 mb-20 mt-40">Portfolio & Professional Links</h4>
                <div class="border-top-light pt-20"></div>
              </div>
              
              <!-- Portfolio Link -->
              <div class="col-12">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Portfolio/Website URL</label>
                <input type="url" name="portfolio_link" class="form-control" placeholder="https://yourportfolio.com" value="{{ old('portfolio_link') }}">
                <div class="text-13 text-light-1 mt-5">Share a link to your portfolio, website, or work samples</div>
              </div>
              
              <!-- Social/Professional Links -->
              <div class="col-lg-6 col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">LinkedIn Profile</label>
                <input type="url" name="linkedin" class="form-control" placeholder="https://linkedin.com/in/yourprofile" value="{{ old('linkedin') }}">
              </div>
              
              <div class="col-lg-6 col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">GitHub Profile</label>
                <input type="url" name="github" class="form-control" placeholder="https://github.com/yourusername" value="{{ old('github') }}">
              </div>
              
              <div class="col-lg-6 col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Fiverr Profile</label>
                <input type="url" name="fiverr" class="form-control" placeholder="https://fiverr.com/yourusername" value="{{ old('fiverr') }}">
              </div>
              
              <div class="col-lg-6 col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Upwork Profile</label>
                <input type="url" name="upwork" class="form-control" placeholder="https://upwork.com/freelancers/~yourprofile" value="{{ old('upwork') }}">
              </div>
              
              <!-- Profile Picture -->
              <div class="col-12">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Professional Profile Picture</label>
                <input type="file" name="picture" class="form-control" accept="image/*">
                <div class="text-13 text-light-1 mt-5">Upload a professional headshot (JPG, PNG, max 2MB)</div>
              </div>
              
              <!-- Additional Options -->
              <div class="col-12">
                <h4 class="text-20 fw-500 text-dark-1 mb-20 mt-40">Additional Options</h4>
                <div class="border-top-light pt-20"></div>
              </div>
              
              <!-- Interview Option -->
              <div class="col-12">
                <div class="form-checkbox d-flex items-center">
                  <input type="checkbox" name="apply_for_interview" class="form-checkbox__input" {{ old('apply_for_interview') ? 'checked' : '' }}>
                  <div class="form-checkbox__mark">
                    <div class="form-checkbox__icon icon-check"></div>
                  </div>
                  <div class="text-15 text-dark-1 ml-10">
                    <strong>Apply for Featured Freelancer Interview</strong><br>
                    <span class="text-13 text-light-1">Get a chance to be featured on our platform and gain more visibility to potential clients</span>
                  </div>
                </div>
              </div>
              
              <!-- Terms & Submit -->
              <div class="col-12">
                <div class="form-checkbox d-flex items-center mb-30">
                  <input type="checkbox" class="form-checkbox__input" required>
                  <div class="form-checkbox__mark">
                    <div class="form-checkbox__icon icon-check"></div>
                  </div>
                  <div class="text-14 text-dark-1 ml-10">
                    I agree to the <a href="#" class="text-purple-1">Terms of Service</a> and <a href="#" class="text-purple-1">Privacy Policy</a>
                  </div>
                </div>
              </div>
              
              <!-- Submit Button -->
              <div class="col-12">
                <button type="submit" class="button -md text-white col-12" style="background: linear-gradient(90deg, #ff6b35 0%, #ff4757 100%);">
                  <i class="icon-arrow-top-right text-16 mr-10"></i>
                  Submit Application
                </button>
              </div>
            </div>
          </form>
</div>

<script>
    let selectedSkills = [];

    function togglePassword() {
        const passwordField = document.querySelector('input[name="password"]');
        const eyeIcon = document.querySelector('.lucide-eye');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    }

    function addSkill(skill) {
        if (skill && !selectedSkills.includes(skill)) {
            selectedSkills.push(skill);
            updateSkillsDisplay();
            updateSkillsInput();
        }
    }

    function removeSkill(skill) {
        selectedSkills = selectedSkills.filter(s => s !== skill);
        updateSkillsDisplay();
        updateSkillsInput();
    }

    function updateSkillsDisplay() {
        const container = document.getElementById('selectedSkills');
        const noSkillsMsg = document.getElementById('noSkillsMsg');
        
        if (selectedSkills.length === 0) {
            container.innerHTML = '<p class="text-gray-500 text-sm" id="noSkillsMsg">No skills added yet.</p>';
        } else {
            container.innerHTML = selectedSkills.map(skill => 
                `<span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm flex items-center gap-2">
                    ${skill}
                    <button type="button" onclick="removeSkill('${skill}')" class="text-orange-600 hover:text-orange-800">&times;</button>
                </span>`
            ).join('');
        }
    }

    function updateSkillsInput() {
        document.getElementById('skillsInput').value = JSON.stringify(selectedSkills);
    }

    // Event listeners
    document.getElementById('skillSelect').addEventListener('change', function() {
        const skill = this.value;
        if (skill) {
            addSkill(skill);
            this.value = '';
        }
    });

    document.getElementById('addSkillBtn').addEventListener('click', function() {
        const customSkillInput = document.getElementById('customSkill');
        const skill = customSkillInput.value.trim();
        if (skill) {
            addSkill(skill);
            customSkillInput.value = '';
        }
    });

    // Initialize with old values if available
    @if(old('skills'))
        selectedSkills = {!! json_encode(old('skills')) !!};
        updateSkillsDisplay();
    @endif
</script>
@endsection
