<x-app-layout>

    <div class="w-full">
        <div class="mx-auto">
            {{-- header --}}
            <div
                class="bg-sidebar overflow-hidden shadow-sm mb-2 sm:rounded-lg flex flex-col md:flex-row justify-between items-center">
                <div class="p-4 text-[#bc9c22] text-xl uppercase">
                    <span>{{ __('Your gateway to success, welcome back, goldenian!') }}</span>
                </div>

                <div class="hs-dropdown relative inline-flex">
                    <button id="hs-dropdown-custom-trigger" type="button"
                        class="hs-dropdown-toggle py-1 ps-1 pe-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-full focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        {{-- <img class="w-8 h-auto rounded-full" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Avatar"> --}}
                        <span
                            class="w-10 h-10 border text-xl border-[#bc9c22] bg-[#bc9c22] rounded-full flex justify-center items-center font-bold text-green">{{ $initial }}</span>
                        <span
                            class="text-white font-medium truncate max-w-[7.5rem] dark:text-neutral-400">{{ auth()->user()->name }}</span>
                        <svg class="hs-dropdown-open:rotate-180 size-4 text-white" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-sidebar shadow-md rounded-lg p-1 space-y-0.5 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                        role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-custom-trigger">
                        <a class="flex items-center gap-x-1.5 py-2 px-3 rounded-lg text-sm text-white hover:bg-hover focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                            href="{{ asset(Auth::user()->profile) }}">
                            <svg class="text-[#bc9c22]" xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                fill="currentColor" stroke="currentColor"
                                viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L64 0zm96 320l64 0c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16L96 416c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM144 64l96 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-96 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                            </svg>
                            Manage Profile
                        </a>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf

                            <button
                                class="w-full flex items-center gap-x-1.5 py-2 px-3 rounded-lg text-sm text-white hover:bg-hover focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                type="submit">
                                <svg class="text-[#bc9c22]" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="20" fill="currentColor" stroke="currentColor"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                </svg>
                                Logout
                            </button>
                        </form>


                    </div>
                </div>
            </div>

            {{-- Student Profile --}}
            <div class="bg-slate-100 overflow-hidden shadow-sm rounded p-2 text-green mb-2">
                <div class="flex flex-wrap justify-between gap-2 items-center">
                    <div class="flex-1 p-2 flex items-center gap-2">
                        <div class="profile">
                            <img class="w-[100px] h-[100px] rounded-full" src="{{ asset(Auth::user()->profile) }}"
                                alt="" srcset="">
                        </div>
                        <div class="details flex flex-col uppercase">
                            {{-- {{ $existingEnrollmentForm }} --}}
                            <span class="font-bold">{{ $information->information->firstname }},
                                {{ $information->information->lastname }},
                                {{ $information->information->middlename }}</span>
                                <span class="text-sm">
                                    @php
                                        // Check if $existingEnrollmentForm is not null
                                        $year = $existingEnrollmentForm ? $existingEnrollmentForm->year_level : null;
                                        $yearText = '';
                                
                                        // Only proceed if the year is available
                                        if ($year !== null) {
                                            switch($year) {
                                                case 1:
                                                    $yearText = '1st Year';
                                                    break;
                                                case 2:
                                                    $yearText = '2nd Year';
                                                    break;
                                                case 3:
                                                    $yearText = '3rd Year';
                                                    break;
                                                case 4:
                                                    $yearText = '4th Year';
                                                    break;
                                                default:
                                                    $yearText = $year . 'th Year'; // Handle any other case
                                                    break;
                                            }
                                        }
                                    @endphp
                                {{ $yearText ?? 'N/A' }}, {{ $existingEnrollmentForm->abbrev ?? 'Code' }}</span>
                            <span class="text-sm">{{ $existingEnrollmentForm->program ?? 'Program' }}</span>
                            <span class="text-sm">{{ $existingEnrollmentForm->semester ?? 'Semester' }} Semester AY {{ $existingEnrollmentForm->academic_year ?? 'N/A' }}</span>
                            @if ($existingEnrollmentForm)
                                <span class="text-sm text-[#bc9c22]">{{ $existingEnrollmentForm && $existingEnrollmentForm->status !== 'enrolled' ? 'not-enrolled' : 'enrolled' }}</span>
                            @else
                                <span class="text-sm text-[#bc9c22]">{{ $existingEnrollmentForm && $existingEnrollmentForm->status !== 'enrolled' ? 'not-enrolled' : 'N/A' }}</span>
                                
                            @endif
                        </div>
                    </div>
                    <div class="">
                        <div>
                            <svg class="shrink-0 size-28 text-white" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor"
                                viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- dahboard content --}}
            <div class="bg-white overflow-hidden shadow-sm rounded p-2">
                <span class="flex items-center justify-between gap-2 font-bold ps-2 text-xl text-green py-2">Online Enrollment Form for class
                    {{ $existingEnrollmentForm->academic_year ?? 'Not Available' }}
                    <span id="status" class="text-white rounded-sm px-2 text-sm"></span>
                </span>
                <div class="bg-slate-200 p-2">
                    <form action="{{ route('student.dashboard.enrollment.insert') }}" method="post">
                        <input class="hidden" type="number" name="academic_id" value="{{ $courses[1]->acad_year_id }}"
                            class="">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                            {{-- Student No. --}}
                            <div class="space-y-3">
                                <div class="relative">
                                    <input name="std_no" placeholder="Student No."
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('std_no')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Course. --}}
                            <div class="flex-1 space-y-3">
                                <div class="relative">
                                    <select name="course"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                        <option value="" disabled>Choose a course...</option>
                                        @foreach ($courses as $item)
                                            <option value="{{ $item->id }}">{{ $item->program }}</option>
                                        @endforeach
                                        <!-- Add more courses here -->
                                    </select>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>

                                @error('course')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- sem/summer. --}}
                            <div class="flex-1 space-y-3">
                                <div class="relative">
                                    <select name="semester"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                        <option value="">Choose a semester...</option>
                                        @foreach ($courses as $item)
                                            @foreach ($item->semesters as $sem)
                                                <option value="{{ $sem['semester_id'] }}" class="uppercase">
                                                    {{ $sem['semester_name'] }} - {{ $item['abbrev'] }}</option>
                                            @endforeach
                                        @endforeach
                                        <!-- Add more options if necessary -->
                                    </select>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>

                                @error('semester')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- year level. --}}
                            <div class="flex-1 space-y-3">
                                <div class="relative">
                                    <select name="year_level"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                        <option value="">Choose a level...</option>
                                        <option value="1">1st Year</option>
                                        <option value="2">2nd Year</option>
                                        <option value="3">3rd Year</option>
                                        <option value="4">4th Year</option>
                                        <option value="5">Summer-1</option>
                                        <option value="6">Summer-2</option>

                                    </select>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('year_level')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Name. --}}
                            <div class="flex-1 space-y-3">
                                <div class="relative">
                                    <input name="name"
                                        value="{{ $student_information->firstname }} {{ $student_information->lastname }} {{ $student_information->middlename }}"
                                        placeholder="Fullname"
                                        class="uppercase peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('name')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Gender. --}}
                            <div class="flex-1 space-y-3">
                                <div class="relative">
                                    <select name="gender"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                        <option value="" disabled>Choose a semester...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>

                                    </select>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('gender')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Contact Number. --}}
                            <div class="flex-1 space-y-3">
                                <div class="relative">
                                    <input name="contact_number" placeholder="Contact Number"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('contact_number')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Civil status. --}}
                            <div class="flex-1 space-y-3">
                                <div class="relative">
                                    <select name="civil_status"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                        <option value="" disabled>Select Civil Status</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="widowed">Widowed</option>
                                        <option value="separated">Separated</option>
                                        <option value="divorced">Divorced</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor" stroke="currentColor">
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>

                                @error('civil_status')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Nationality. --}}
                            <div class="flex-1 space-y-3">
                                <div class="relative">
                                    <select name="nationality"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                        <option value="">Select Nationality</option>
                                        <option value="american">American</option>
                                        <option value="filipino">Filipino</option>
                                        <option value="canadian">Canadian</option>
                                        <option value="british">British</option>
                                        <option value="australian">Australian</option>
                                        <option value="indian">Indian</option>
                                        <!-- Add more nationalities as needed -->
                                    </select>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor" stroke="currentColor">
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>

                                @error('nationality')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Date of birth. --}}
                            <div class="flex-1 space-y-3">
                                <div class="relative">
                                    <input name="date_of_birth" type="date"
                                        value="{{ $student_information->birthdate }}" placeholder="Date of Birth"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('date_of_birth')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Place of birth. --}}
                            <div class="flex-1 space-y-3">
                                <div class="relative">
                                    <input name="place_of_birth" placeholder="Place of Birth"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('place_of_birth')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Age. --}}
                            <div class="flex-1 space-y-3">
                                <div class="relative">
                                    <input name="age" type="number" value="{{ $student_information->age }}"
                                        placeholder="Age"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('age')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Guardian. --}}
                            <div class="col-span-2 space-y-3">
                                <div class="relative">
                                    <input name="guardian"
                                        value="{{ $student_information->guardian_firstname }} {{ $student_information->guardian_lastname }} {{ $student_information->guardian_middlename }}"
                                        placeholder="Guardian"
                                        class="uppercase peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('guardian')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Address. --}}
                            <div class="col-span-2 space-y-3">
                                <div class="relative">
                                    <input name="address" value="{{ $student_information->address }}"
                                        placeholder="Address"
                                        class="uppercase peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('address')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Elementary. --}}
                            <div class="col-span-3 space-y-3">
                                <div class="relative">
                                    <input name="elementary" placeholder="Elementary"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('elementary')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Elementary Gradudated. --}}
                            <div class="col-span-1 space-y-3">
                                <div class="relative">
                                    <input name="elementary_graduated" placeholder="Elementary Graduated"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('elementary_graduated')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            {{-- Secondary. --}}
                            <div class="col-span-3 space-y-3">
                                <div class="relative">
                                    <input name="secondary" placeholder="Secondary"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('secondary')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Secondary Gradudated. --}}
                            <div class="col-span-1 space-y-3">
                                <div class="relative">
                                    <input name="secondary_graduated" placeholder="Secondary Graduated"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('secondary_graduated')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            {{-- Senior High School. --}}
                            <div class="col-span-3 space-y-3">
                                <div class="relative">
                                    <input name="senior_high_school" placeholder="Senior High School"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('senior_high_school')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Senior High School Gradudated. --}}
                            <div class="col-span-1 space-y-3">
                                <div class="relative">
                                    <input name="senior_high_school_graduated"
                                        placeholder="Senior High School Graduated"
                                        class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('senior_high_school_graduated')
                                    <div class="flex gap-2 items-center">
                                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" fill="currentColor"
                                            stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            {{-- subjects collectiojn for this program --}}
                            <span class="font-bold ps-2 text-xl text-green col-span-4 capitalize">Year level and
                                associated subject collection 
                                @error('selected_subjects')
                                    <span class="text-red-500">Error: {{ $message }}</span>
                                @enderror
                            </span>

                            @php
                                // Initialize an array to keep track of displayed subject IDs
                                $displayedSubjectIds = [];
                            @endphp

                            @foreach ($courses as $cs)
                                @foreach ($cs->year_level as $yl)
                                    @foreach ($yl->subs as $s)
                                        @if (!in_array($s->id, $displayedSubjectIds)) <!-- Check if the subject ID has already been displayed -->
                                            <div class="relative flex items-start bg-white p-2 rounded-md">
                                                <div class="flex items-center h-5 mt-1">
                                                    <input name="selected_subjects[]" value="{{ $s->id }}" type="checkbox"
                                                        class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        aria-describedby="hs-checkbox-delete-description">
                                                </div>
                                                <label for="hs-checkbox-delete" class="ms-3">
                                                    <span class="block text-sm font-semibold text-green dark:text-neutral-300">{{ $yl->year_level_name }}</span>
                                                    <span id="hs-checkbox-delete-description"
                                                        class="block text-xs text-gray-600 dark:text-neutral-500">
                                                        Code: <span class="bg-slate-200 px-1 font-bold text-green">{{ $s->subject_code }}</span> - 
                                                        <span class="bg-slate-200 px-1 font-bold text-green">{{ $s->subject_name }}</span> - 
                                                        <span class="font-bold bg-red-500 px-1 rounded-xl text-white text-xs">{{ $s->credits }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            @php
                                                // Add the subject ID to the displayed subjects array
                                                $displayedSubjectIds[] = $s->id;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach


                        </div>
                        <button id="submit" type="submit"
                            class="bg-red-500 p-2 mt-2 text-white rounded-md hover:bg-red-700 hover:cursor-pointer">Submit
                            Registration</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

    @section('scripts')
        <script>
            $(document).ready(function(){

                
                $form_status = @json(session('status'));
                $form_message = @json(session('message'));
                $enrollment_info = @json($existingEnrollmentForm);
                console.log($enrollment_info.status)
                if($enrollment_info.status === 'resubmit'){
                    $('#submit').removeClass('hidden')
                    $('input[name="std_no"]').val($enrollment_info.student_no)
                    $('select[name="semester"]').val(String($enrollment_info.semester_id)).trigger('change').focus().blur();
                    $('select[name="year_level"]').val(String($enrollment_info.year_level_with_subject_id)).trigger('change').focus().blur();
                    $('input[name="contact_number"]').val($enrollment_info.contact_number)
                    $('input[name="place_of_birth"]').val($enrollment_info.place_of_birth)
                    $('input[name="elementary"]').val($enrollment_info.elementary)
                    $('input[name="elementary_graduated"]').val($enrollment_info.elementary_year)
                    $('input[name="secondary"]').val($enrollment_info.secondary)
                    $('input[name="secondary_graduated"]').val($enrollment_info.secondary_year)
                    $('input[name="senior_high_school"]').val($enrollment_info.senior_high)
                    $('input[name="senior_high_school_graduated"]').val($enrollment_info.senior_high_year)
                    $('#status').text($enrollment_info.status).addClass('bg-red-500')
                }
                if ($enrollment_info == null || $enrollment_info === "" || $.isEmptyObject($enrollment_info)) {
                    console.log("Enrollment info is either null, empty, or an empty object.");
                    $('#submit').removeClass('hidden')
                } else if ($enrollment_info.status === 'in-process' || $enrollment_info.status === 'processed' || $enrollment_info.status === 'enrolled') {
                    console.log($enrollment_info)
                    $('input[name="std_no"]').val($enrollment_info.student_no)
                    $('select[name="semester"]').val(String($enrollment_info.semester_id)).trigger('change').focus().blur();
                    $('select[name="year_level"]').val(String($enrollment_info.year_level_with_subject_id)).trigger('change').focus().blur();
                    $('input[name="contact_number"]').val($enrollment_info.contact_number)
                    $('input[name="place_of_birth"]').val($enrollment_info.place_of_birth)
                    $('input[name="elementary"]').val($enrollment_info.elementary)
                    $('input[name="elementary_graduated"]').val($enrollment_info.elementary_year)
                    $('input[name="secondary"]').val($enrollment_info.secondary)
                    $('input[name="secondary_graduated"]').val($enrollment_info.secondary_year)
                    $('input[name="senior_high_school"]').val($enrollment_info.senior_high)
                    $('input[name="senior_high_school_graduated"]').val($enrollment_info.senior_high_year)
                    $('#status').text($enrollment_info.status).addClass('bg-red-500')
                    $('#submit').addClass('hidden')
                }

                // alert($form_status)
                // console.log($enrollement_info)
                // popup 
               
                const popup = (s, m) => {
                    let icon = 'success'
                    var baseURL = window.location.protocol + '//' + window.location.host; 
                    switch (s) {
                        case 'submitted':
                            icon = 'success'
                            Swal.fire({
                                title: "Status of your application form",
                                text: m,
                                icon: icon,
                                confirmButtonText: "Ok"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = baseURL + '/student/notification'
                                }
                            });
                            $('#submit').attr('disabled', true)
                            break;
                        case 'in-process':
                            icon = 'info'
                            Swal.fire({
                                title: "Status of your application form",
                                text: m,
                                icon: icon
                            });
                            $('#submit').attr('disabled', true)
                            break;
                    
                        default:
                            break;
                    }
                    
                }

                const liabilities = @json($liabilities); // Pass liabilities data from Blade to JS
                const tags = @json($tags); // Pass liabilities data from Blade to JS

                console.log('connected to notification...')
                //control enrolllent btn
                const enrollmentBtn = () => {
                    const button = $('#student_er_btn');
                    button.off('click'); // Remove any existing click handlers

                    if (tags.length > 0) {
                        button
                            .addClass('disabled') // Add a class to style it as disabled
                            .attr('href', '#')    // Prevent navigation
                            .css('pointer-events', 'none'); // Disable pointer events
                        button.find('span').text('closed'); // Change text to 'closed'
                    }
                }

                //control liabilities button
                const liabilitiesBtn = () => {
                    const button = $('#lia_btn');

                    if (tags.length > 0) {
                        button.find('span').text(`${tags.length} found`); // Change text to 'closed'
                    }else{
                        button.find('span').text(``);
                    }
                }
                
                $('#lia_btn').click(function(){
                    // alert('yes')
                    let html = ''
                    tags.forEach(tag => {
                        console.log(tag)
                        html += `
                            <div class="bg-slate-50 p-2 rounded-sm shadow flex flex-col gap-2">
                                <p class="text-green">${tag.liabilities_description}</p>
                                <span class="text-xs uppercase">${tag.semester} / ${tag.academic_year} / <span class="text-red-500">${tag.status}</span></span> 
                                <span class="text-xs">posted by: ${tag.name} - ${tag.created_at}</span> 
                            </div>
                        `
                    });
                    $('#render-list').html(html)
                    $('#liabilities_found_btn').trigger('click')
                })

                enrollmentBtn()
                liabilitiesBtn()

                popup($form_status, $form_message)
            })
        </script>
    @endsection
</x-app-layout>
