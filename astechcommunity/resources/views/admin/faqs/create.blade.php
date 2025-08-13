@extends('layouts.admin')

@section('title', 'Create New FAQ')

@section('content')
<div class="container py-60">
    <div class="row">
        <div class="col-12">
            <div class="admin-page-header d-flex justify-content-between align-items-center">
              <h1 class="admin-page-title">Create FAQ</h1>
              <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left mr-1"></i> Back</a>
              </div>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h6 class="fw-500 mb-10">Please fix the following errors:</h6>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="bg-white rounded-8 shadow-2 px-30 py-30">
                <form method="POST" action="{{ route('admin.faqs.store') }}">
                    @csrf
                    
                    <div class="row y-gap-20">
                        <!-- Question -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Question *</label>
                                <textarea name="question" rows="3" class="form-control -md @error('question') is-invalid @enderror" 
                                          placeholder="Enter the frequently asked question" required>{{ old('question') }}</textarea>
                                <small class="text-13 text-dark-1">Make the question clear and specific</small>
                                @error('question')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Answer -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Answer *</label>
                                <textarea name="answer" rows="8" class="form-control -md @error('answer') is-invalid @enderror" 
                                          placeholder="Provide a comprehensive answer to the question" required>{{ old('answer') }}</textarea>
                                <small class="text-13 text-dark-1">Provide a clear and helpful answer. You can use HTML formatting.</small>
                                @error('answer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- FAQ Settings -->
            <div class="bg-white rounded-8 shadow-2 px-25 py-30 mb-30">
                <h5 class="text-18 fw-500 mb-20">FAQ Settings</h5>
                
                <div class="y-gap-20">
                    <!-- Category -->
                    <div class="form-group">
                        <label class="text-14 fw-500 text-dark-1 mb-10">Category *</label>
                        <select name="category" form="faq-form" class="form-control -sm @error('category') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            <option value="General" {{ old('category') == 'General' ? 'selected' : '' }}>General</option>
                            <option value="Services" {{ old('category') == 'Services' ? 'selected' : '' }}>Services</option>
                            <option value="Pricing" {{ old('category') == 'Pricing' ? 'selected' : '' }}>Pricing</option>
                            <option value="Technical" {{ old('category') == 'Technical' ? 'selected' : '' }}>Technical</option>
                            <option value="Account" {{ old('category') == 'Account' ? 'selected' : '' }}>Account</option>
                            <option value="Support" {{ old('category') == 'Support' ? 'selected' : '' }}>Support</option>
                            <option value="Billing" {{ old('category') == 'Billing' ? 'selected' : '' }}>Billing</option>
                            <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Sort Order -->
                    <div class="form-group">
                        <label class="text-14 fw-500 text-dark-1 mb-10">Sort Order</label>
                        <input type="number" name="sort_order" form="faq-form" class="form-control -sm @error('sort_order') is-invalid @enderror" 
                               placeholder="e.g., 1, 2, 3..." value="{{ old('sort_order') }}" min="0">
                        <small class="text-12 text-dark-1">Lower numbers appear first. Leave empty for automatic ordering.</small>
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Featured Status -->
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input type="checkbox" name="is_featured" form="faq-form" class="form-check-input" id="is_featured" 
                                   value="1" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label text-14" for="is_featured">
                                Featured FAQ
                            </label>
                        </div>
                        <small class="text-12 text-dark-1">Featured FAQs appear prominently on the FAQ page</small>
                    </div>

                    <div class="border-top-light pt-20">
                        <div class="d-flex flex-column y-gap-10">
                            <button type="submit" form="faq-form" class="button -sm -orange-1 text-white">
                                <i class="icon-save mr-10"></i>Create FAQ
                            </button>
                            <a href="{{ route('admin.faqs.index') }}" class="button -sm -outline-dark-1 text-dark-1">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Guidelines -->
            <div class="bg-white rounded-8 shadow-2 px-25 py-30">
                <h6 class="text-16 fw-500 mb-15">FAQ Best Practices</h6>
                <div class="y-gap-15">
                    <div class="d-flex items-start x-gap-10">
                        <i class="icon-check text-14 text-green-1 mt-2"></i>
                        <div>
                            <small class="text-13 text-dark-1 fw-500">Clear Questions</small>
                            <br>
                            <small class="text-12 text-dark-1">Use simple, specific language</small>
                        </div>
                    </div>
                    <div class="d-flex items-start x-gap-10">
                        <i class="icon-check text-14 text-green-1 mt-2"></i>
                        <div>
                            <small class="text-13 text-dark-1 fw-500">Comprehensive Answers</small>
                            <br>
                            <small class="text-12 text-dark-1">Address all aspects of the question</small>
                        </div>
                    </div>
                    <div class="d-flex items-start x-gap-10">
                        <i class="icon-check text-14 text-green-1 mt-2"></i>
                        <div>
                            <small class="text-13 text-dark-1 fw-500">Use Categories</small>
                            <br>
                            <small class="text-12 text-dark-1">Group related questions together</small>
                        </div>
                    </div>
                    <div class="d-flex items-start x-gap-10">
                        <i class="icon-check text-14 text-green-1 mt-2"></i>
                        <div>
                            <small class="text-13 text-dark-1 fw-500">Priority Order</small>
                            <br>
                            <small class="text-12 text-dark-1">Use sort order for important FAQs</small>
                        </div>
                    </div>
                    <div class="d-flex items-start x-gap-10">
                        <i class="icon-check text-14 text-green-1 mt-2"></i>
                        <div>
                            <small class="text-13 text-dark-1 fw-500">Regular Updates</small>
                            <br>
                            <small class="text-12 text-dark-1">Keep answers current and accurate</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Preview -->
    <div class="row mt-30" id="faq-preview" style="display: none;">
        <div class="col-12">
            <div class="bg-white rounded-8 shadow-2 px-30 py-30">
                <h5 class="text-18 fw-500 mb-20">FAQ Preview</h5>
                <div class="border-light rounded-8 p-20">
                    <div class="d-flex items-start x-gap-15">
                        <div class="size-40 rounded-full bg-orange-1 d-flex items-center justify-center">
                            <i class="icon-help-circle text-16 text-white"></i>
                        </div>
                        <div class="flex-1">
                            <h6 class="text-16 fw-500 mb-10" id="preview-question">Your question will appear here...</h6>
                            <div class="text-14 text-dark-1" id="preview-answer">Your answer will appear here...</div>
                            <div class="d-flex items-center x-gap-15 mt-15">
                                <span class="badge -orange-1 text-orange-1 text-11" id="preview-category">Category</span>
                                <span class="badge -outline-purple-1 text-purple-1 text-11" id="preview-featured" style="display: none;">Featured</span>
                                <small class="text-12 text-dark-1">Sort Order: <span id="preview-sort">Auto</span></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Add form ID to the main form
document.querySelector('form').setAttribute('id', 'faq-form');

// Real-time preview functionality
const questionInput = document.querySelector('textarea[name="question"]');
const answerInput = document.querySelector('textarea[name="answer"]');
const categorySelect = document.querySelector('select[name="category"]');
const sortOrderInput = document.querySelector('input[name="sort_order"]');
const featuredCheckbox = document.querySelector('input[name="is_featured"]');

const previewSection = document.getElementById('faq-preview');
const previewQuestion = document.getElementById('preview-question');
const previewAnswer = document.getElementById('preview-answer');
const previewCategory = document.getElementById('preview-category');
const previewFeatured = document.getElementById('preview-featured');
const previewSort = document.getElementById('preview-sort');

function updatePreview() {
    const question = questionInput.value.trim();
    const answer = answerInput.value.trim();
    const category = categorySelect.value;
    const sortOrder = sortOrderInput.value;
    const isFeatured = featuredCheckbox.checked;

    if (question || answer) {
        previewSection.style.display = 'block';
        previewQuestion.textContent = question || 'Your question will appear here...';
        previewAnswer.innerHTML = answer.replace(/\n/g, '<br>') || 'Your answer will appear here...';
        previewCategory.textContent = category || 'Category';
        previewSort.textContent = sortOrder || 'Auto';
        
        if (isFeatured) {
            previewFeatured.style.display = 'inline-block';
        } else {
            previewFeatured.style.display = 'none';
        }
    } else {
        previewSection.style.display = 'none';
    }
}

// Add event listeners for real-time preview
questionInput.addEventListener('input', updatePreview);
answerInput.addEventListener('input', updatePreview);
categorySelect.addEventListener('change', updatePreview);
sortOrderInput.addEventListener('input', updatePreview);
featuredCheckbox.addEventListener('change', updatePreview);

// Form validation
document.querySelector('#faq-form').addEventListener('submit', function(e) {
    const question = questionInput.value.trim();
    const answer = answerInput.value.trim();
    const category = categorySelect.value;

    if (!question || !answer || !category) {
        e.preventDefault();
        alert('Please fill in all required fields (Question, Answer, Category).');
        return false;
    }

    if (question.length < 10) {
        e.preventDefault();
        alert('Question should be at least 10 characters long.');
        return false;
    }

    if (answer.length < 20) {
        e.preventDefault();
        alert('Answer should be at least 20 characters long.');
        return false;
    }
});

// Character counters
function addCharacterCounter(textarea, minChars) {
    const counter = document.createElement('small');
    counter.className = 'text-12 text-dark-1 mt-5 d-block';
    textarea.parentNode.appendChild(counter);

    function updateCounter() {
        const charCount = textarea.value.length;
        counter.textContent = `${charCount} characters`;
        
        if (charCount < minChars) {
            counter.className = 'text-12 text-red-1 mt-5 d-block';
        } else {
            counter.className = 'text-12 text-green-1 mt-5 d-block';
        }
    }

    textarea.addEventListener('input', updateCounter);
    updateCounter();
}

addCharacterCounter(questionInput, 10);
addCharacterCounter(answerInput, 20);
</script>
@endsection
