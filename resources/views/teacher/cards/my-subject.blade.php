<div data-code="{{ $subject->subject_code }}" data-level="{{ $subject->college_level_number }}" class="subject-card relative bg-white shadow-lg rounded-lg p-6 flex flex-col items-start transition-all duration-300 hover:shadow-xl hover:scale-105 transform">
    <!-- Icon Section -->
    <svg class="w-12 h-12 mx-auto text-green mb-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
        <path d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
    </svg>

    <!-- Subject Title and Details -->
    <div class="mb-16 flex-1">
        <!-- Subject Title -->
        <h3 class="subject_name text-base font-semibold text-green mb-2 px-3">{{ $subject->subject_name }}</h3>

        <!-- Subject Code -->
        <p class="text-sm text-gray-600 text-left px-3">Code: <span class="subject_code font-medium">{{ $subject->subject_code }}</span></p>
        <p class="text-sm text-gray-600 text-left px-3">Credits: <span class="subject_code font-medium">{{ $subject->credits }}</span></p>

        <!-- Year Level -->
        <p class="text-sm text-gray-600 text-left px-3">
            Level: {{ $subject->college_level_name }}
        </p>

        <!-- Instructor -->
        <p class="text-sm text-gray-600 text-left px-3">Enrolled: <span class="font-medium">{{ $subject->enrolled_students_count ? $subject->enrolled_students_count : '0' }}</span></p>
    </div>

    <!-- Select and Credits Button Section -->
    <div class="absolute left-0 bottom-0 w-full grid grid-cols-2 items-center">
        <!-- Select Button -->
        <button data-my_subject_id="{{ $subject->id }}" class="enrolled-button flex-1 bg-slate-50 border text-green px-4 py-2 hover:bg-slate-100 transition-colors duration-300 focus:outline-none">
            Enroll
        </button>
        
        <!-- Credits Button -->
        <button data-my_subject_id="{{ $subject->id }}" class="remove-button flex-1 bg-slate-50 text-red-500 border border-gray-300 px-4 py-2 hover:bg-gray-100 transition-colors duration-300">
            Remove
        </button>
        <!-- Credits Button -->
        <a href="{{ route('teacher.my.student', $subject->subject_id) }}" class="col-span-2 text-center bg-slate-50 text-green border border-gray-300 px-4 py-2 hover:bg-gray-100 transition-colors duration-300">
            Open
        </a>
    </div>
</div>
