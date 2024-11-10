<div data-level="{{ $year }}" data-subject_name="{{ $subject->subject_name }}" data-code="{{ $subject->subject_code }}" class="subject-card relative bg-white shadow-lg rounded-lg p-6 flex flex-col items-center transition-all duration-300 hover:shadow-xl hover:scale-105 transform">
    <!-- Icon Section -->
    <svg class="w-12 h-12 text-green mb-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
        <path d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
    </svg>

    <!-- Subject Title and Details -->
    <div class="mb-6 flex-1 text-justify">
        <!-- Subject Title -->
        <h3 class="subject_name text-xl font-semibold text-green mb-2 text-center">{{ $subject->subject_name }}</h3>

        <!-- Subject Code -->
        <p class="text-sm text-gray-600 text-center">Code: <span class="subject_code font-medium text-green">{{ $subject->subject_code }}</span></p>

        <!-- Year Level -->
        <p class="text-sm text-gray-600 text-center">
            Level: 
            @php
                $yearLevel = $year; // Assuming $year holds the numeric value (1, 2, 3, 4)
            @endphp
            @switch($yearLevel)
                @case(1)
                   <span class="text-green">First Year</span>
                    @break
                @case(2)
                    Second Year
                    @break
                @case(3)
                    Third Year
                    @break
                @case(4)
                    Fourth Year
                    @break
                @default
                    Unknown Year Level
            @endswitch    
        </p>

        <!-- Instructor -->
        <p class="text-sm text-gray-600 text-center">Instructor: <span class="font-medium {{ $subject->teacher_name ? "text-green" : 'text-red-500' }}">
            {{ $subject->teacher_name ? $subject->teacher_name : 'N/A' }}</span></p>
    </div>

    <!-- Select and Credits Button Section -->
    <div class="absolute bottom-0 w-full flex items-center justify-between">
        <!-- Select Button -->
        @if (!$subject->teacher_name)    
            <button data-subject_id="{{ $subject->id }}" data-college_level="{{ $year }}" data-subject_name="{{ $subject->subject_name }}" data-code="{{ $subject->subject_code }}" class="select-button flex-1 bg-slate-50 border text-green px-4 py-2 hover:bg-slate-100 transition-colors duration-300 focus:outline-none">
                Select
            </button>

        @else
            <button class="flex-1 bg-slate-50 text-red-500 border border-gray-300 px-4 py-2 hover:bg-gray-100 transition-colors duration-300">
                Taken
            </button>
        @endif

        <!-- Credits Button -->
        <button class="flex-1 bg-slate-50 text-black border border-gray-300 px-4 py-2 hover:bg-gray-100 transition-colors duration-300">
            Credits: {{ $subject->credits }}
        </button>
    </div>
</div>
