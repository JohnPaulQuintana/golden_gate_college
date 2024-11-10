<x-app-layout>

    <div class="w-full">
        <div class="mx-auto">
            {{-- header --}}
            <div
                class="bg-sidebar overflow-hidden shadow-sm mb-2 sm:rounded-lg flex flex-col md:flex-row justify-between items-center">
                <div class="p-4 text-white text-xl">
                    {{ __('Manage Academic Year : ') }} {{ $semesterWithAcadYear->academic_year->academic_year }}
                </div>

                <div class="hs-dropdown relative z-[999] inline-flex">
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

            {{-- analytics --}}
            <div class="overflow-hidden shadow-sm rounded p-2">

                <form action="{{ route('dean.semester.manage.update') }}" method="post">
                    @csrf
                    <input type="number" name="semester_id" value="{{ $semesterWithAcadYear->id }}" class="hidden">
                    <div class="flex flex-col max-w-full">
                        <span class="font-bold text-green uppercase tracking-wider">Academic Year Section</span>
                        <div class="mb-2">
                            <div class="flex max-w-full gap-2 mb-2">
                                {{-- Starting Year --}}
                                <div class="flex-1 space-y-3">
                                    <div class="relative">
                                        <select name="starting_year"
                                            class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">

                                            @for ($year = 2024; $year <= 2050; $year++)
                                                <option value="{{ $year }}"
                                                    @if ((int) $startYear === $year) selected @endif>
                                                    {{ $year }}</option>
                                            @endfor
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
                                    @error('starting_year')
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

                                {{-- Starting Year --}}
                                <div class="flex-1 space-y-3">
                                    <div class="relative">
                                        <select name="end_year"
                                            class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">

                                            @for ($year = 2024; $year <= 2050; $year++)
                                                <option value="{{ $year }}"
                                                    @if ((int) $endYear === $year) selected @endif>
                                                    {{ $year }}</option>
                                            @endfor
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
                                    @error('end_year')
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
                                {{-- Semester --}}
                                <div class="flex-1 space-y-3">
                                    <div class="relative">
                                        <select name="semester"
                                            class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">

                                            <option value="first" @if ($semesterWithAcadYear->name === 'first') selected @endif>
                                                First Semester</option>
                                            <option value="second" @if ($semesterWithAcadYear->name === 'second') selected @endif>
                                                Second Semester</option>
                                            <option value="summer" @if ($semesterWithAcadYear->name === 'summer') selected @endif>
                                                Summer</option>
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

                                {{-- program --}}
                                <div class="flex-1 space-y-3">
                                    <div class="relative">
                                        <select name="program"
                                            class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                            <option value="" disabled selected>Select program</option>

                                            @foreach ($programs as $item)
                                                @if ($item->is_open !== 'closed')
                                                    <option value="{{ $item->abbrev }}"
                                                        @if ($item->abbrev === $semesterWithAcadYear->abbrev) selected @endif>
                                                        {{ $item->program }}</option>
                                                @endif
                                            @endforeach
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
                                    @error('program')
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

                                {{-- Status --}}
                                <div class="flex-1 space-y-3">
                                    <div class="relative">
                                        <select name="status"
                                            class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                            <option value="active" @if ($semesterWithAcadYear->status === 'active') selected @endif>
                                                Active</option>
                                            <option value="inactive" @if ($semesterWithAcadYear->status === 'inactive') selected @endif>
                                                Inactive</option>
                                            {{-- <option value="graduated">Graduated</option> --}}
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
                                    @error('status')
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

                            </div>

                        </div>
                    </div>

                    <button type="button" class="bg-red-500 p-1 text-white rounded-md hover:bg-red-500">
                        <a href="{{ route('dean.academic') }}" class="bg-red-500 p-1 text-white rounded-md">Back to
                            academic</a>
                    </button>
                    <button type="submit" class="bg-sidebar p-1 text-white rounded-md hover:bg-green">Update
                        Semester</button>
                    <button type="button" class="bg-red-500 p-1 text-white rounded-md hover:bg-red-500">
                        <a href="{{ route('dean.semester.manage.delete', $semesterWithAcadYear->id) }}"
                            class="bg-red-500 p-1 text-white rounded-md">Delete</a>
                    </button>
                </form>

            </div>

            {{-- table --}}
            {{-- @include('dean.table.academic',['academicYears' => $academicYears, 'programs'=>$programs]) --}}
            <form action="{{ route('dean.level.store') }}" method="post">
                @csrf
                {{-- {{ $semesterWithAcadYear->program }} --}}
                
                <div class="border p-1 grid grid-cols-1 md:grid-cols-2 gap-2">

                    <div class="bg-slate-50 rounded-sm">
                        <span class="font-bold text-green uppercase tracking-wider">Year Level</span>
                        <div class="flex flex-col max-w-full">
                            <div class="mb-2 flex-1">
                                <input type="text" name="program_id" value="{{ $semesterWithAcadYear->program->id }}" class="hidden">
                                <span>{{ $semesterWithAcadYear->program->program }} | {{ $semesterWithAcadYear->program->abbrev }}</span>
                            </div>
                            <div class="mb-2">
                                <div class="flex max-w-full gap-2 mb-2">
                                    {{-- Starting Year --}}
                                    <div class="flex-1 space-y-3">
                                        <div class="relative">
                                            <select name="year_level"
                                                class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                                <option value="">Select a year level</option>
                                                @for ($year = 1; $year <= 10; $year++)
                                                    <option value="{{ $year }}">
                                                        {{ $year }}{{ $year == 1 ? 'st' : ($year == 2 ? 'nd' : ($year == 3 ? 'rd' : 'th')) }}
                                                        Year
                                                    </option>
                                                @endfor
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
                                                <svg class="shrink-0 size-4 text-red-500"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    fill="currentColor"
                                                    stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                                </svg>
                                                <span class="text-sm text-red-500">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>


                                    {{-- Subjects --}}
                                    <div class="flex-1 space-y-3">
                                        <div class="relative">
                                            <!-- Custom Multi-Select Dropdown -->
                                            <div class="relative">
                                                <button id="dropdown-button" type="button"
                                                    class="flex justify-between items-center w-full py-3 px-4 bg-white rounded-md shadow-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                                    <span id="selected-options"
                                                        class="text-gray-700 dark:text-gray-200">Select
                                                        options...</span>
                                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M8 9l4-4 4 4m-4 12V5" />
                                                    </svg>
                                                </button>

                                                <!-- Dropdown Menu -->
                                                <div id="dropdown-menu"
                                                    class="hidden absolute left-0 right-0 mt-1 max-h-72 p-2 bg-white border border-gray-300 rounded-md shadow-lg overflow-auto z-10 dark:bg-gray-800 dark:border-gray-600">

                                                    @foreach ($subjects as $subject)
                                                        <label class="flex items-center py-1">
                                                            <input type="checkbox" name="selected_subject_ids[]"
                                                                value="{{ $subject->id }}"
                                                                class="add_checkbox form-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600">
                                                            <span
                                                                class="ml-2 text-gray-700 dark:text-gray-200">{{ $subject->subject_name }}</span>
                                                        </label>
                                                    @endforeach


                                                </div>
                                            </div>
                                            <!-- End of Custom Multi-Select Dropdown -->

                                        </div>
                                        @error('selected_subject_ids')
                                            <div class="flex gap-2 items-center">
                                                <svg class="shrink-0 size-4 text-red-500"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    fill="currentColor"
                                                    stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                                </svg>
                                                <span class="text-sm text-red-500">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>



                                </div>

                            </div>
                            <button type="submit" class="bg-sidebar p-1 text-white rounded-md hover:bg-green">
                                Save Level
                            </button>
                        </div>
                    </div>

                    <div class="bg-slate-50 rounded-sm h-[400px] overflow-y-auto px-4">
                        <span class="font-bold text-green uppercase tracking-wider">Created Year Level | Subjects <span class="bg-red-500 text-sm px-1 text-white rounded-xl">{{ count($year_levels) }}</span> </span>
                        @foreach ($year_levels as $item)
                            <div
                                data-year_level_id="{{ $item->id }}"
                                data-year_level_selected_ids="{{ $item->selected_subject_ids }}"
                                class="year_level_edit_btn bg-white border-l-4 border-green-700 mb-2 shadow-sm sm:flex dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70 transition ease-in-out delay-150 hover:scale-105 hover:cursor-pointer ">
                                {{-- <div class="shrink-0 relative w-full rounded-t-xl overflow-hidden pt-[40%] sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-xs">
                              <img class="size-full absolute top-0 start-0 object-cover" src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Card Image">
                            </div> --}}
                                <div class="flex flex-wrap">
                                    <div class="p-2 flex flex-col h-full sm:p-3">
                                        <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                            {{ $item->formatted_level }} | {{ $item->program }}
                                        </h3>
                                        <div class="flex flex-col">
                                            @foreach ($item->subjects as $subject)
                                                <span class="border-b-1 border-green-700 flex items-center gap-2 text-green text-sm">
                                                    <svg class="size-3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                                    {{ $subject->subject_code }} | {{ $subject->subject_name }} | {{ $subject->credits }}
                                                </span>
                                            @endforeach
                                        </div>
                                        <div class="mt-5 sm:mt-auto flex items-center justify-between">
                                            <p class="text-xs text-gray-500 dark:text-neutral-500">
                                                {{ $item->created_at }}
                                            </p>
                                            <div>
                                                <a href="{{ route('dean.subjects.destroy', $item->id) }}"
                                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-red-500 text-white shadow-sm hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                    >
                                                    Archived
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                </div>

            </form>

        </div>
    </div>
    @include('dean.modal.edit_year_level')
    @section('scripts')
        <script>
            $(document).ready(function() {
                console.log('adding student connected...')
                $status = @json(session('status'));
                $message = @json(session('message'));



                // Toggle dropdown visibility for edit
                $('.dropdown-button').on('click', function() {
                    $('.dropdown-menu').toggleClass('hidden'); // Toggle the 'hidden' class
                });
                // Toggle dropdown visibility
                $('#dropdown-button').on('click', function() {
                    $('#dropdown-menu').toggleClass('hidden'); // Toggle the 'hidden' class
                });

                
                // Update the selected options display
                $('.add_checkbox').on('change', function() {
                    const selectedCount = $('.add_checkbox:checked')
                        .length; // Count the checked options

                    // Update the button text or display
                    $('#selected-options').text(selectedCount > 0 ? `${selectedCount} option(s) selected` :
                        'Select options...');
                });
                //edit year level information
                $('.year_level_edit_btn').click(function(){
                    // alert($(this).data('year_level_id'))
                    let level_id = $(this).data('year_level_id');
                    $('#edit_level_id').val(level_id)
                    let html_level_id = '';

                    // Start building the options with Blade syntax
                    html_level_id += '<option value="">Select a year level</option>';
                    @for ($year = 1; $year <= 10; $year++)
                        html_level_id += `<option value="{{ $year }}" ${level_id == {{ $year }} ? 'selected' : ''}>
                                    {{ $year }}{{ $year == 1 ? 'st' : ($year == 2 ? 'nd' : ($year == 3 ? 'rd' : 'th')) }} Year
                                </option>`;
                    @endfor

                    // Insert the generated options into the select element
                    $('#level_select').html(html_level_id);

                    let selected_subject_ids = $(this).data('year_level_selected_ids'); // Assuming you store selected IDs as data attribute
                    // alert(selected_subject_ids)
                    console.log(selected_subject_ids)
                    let html_subjects = '';

                    // Start building the checkboxes with Blade syntax
                    @foreach ($subjects as $subject)
                        // console.log($subject)
                        html_subjects += `
                            <label class="flex items-center py-1">
                                <input class="edit-checkbox" type="checkbox" name="selected_subject_ids[]"
                                    value="{{ $subject->id }}"
                                    ${selected_subject_ids.includes('{{ $subject->id }}') ? 'checked' : ''}
                                    class="form-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600">
                                <span class="ml-2 text-gray-700 dark:text-gray-200">{{ $subject->subject_name }}</span>
                            </label>
                        `;

                    @endforeach

                    // Insert the generated HTML into the dropdown menu
                    $('.dp-subjects').html(html_subjects);

                    
                    
                    $('#edit_level_btn').trigger('click')
                    // Update the selected options display for edit
                    $('.edit-checkbox').on('change', function() {
                        const selectedCount = $('.edit-checkbox:checked')
                            .length; // Count the checked options

                        // Update the button text or display
                        $('.selected-options').text(selectedCount > 0 ? `${selectedCount} option(s) selected` :
                            'Select options...');
                    });
                })
                // Close dropdown when clicking outside for edit
                $(document).on('click', function(event) {
                    if (!$(event.target).closest('.dropdown-button, .dropdown-menu').length) {
                        $('.dropdown-menu').addClass('hidden'); // Hide the dropdown
                    }
                });
                // Close dropdown when clicking outside
                $(document).on('click', function(event) {
                    if (!$(event.target).closest('#dropdown-button, #dropdown-menu').length) {
                        $('#dropdown-menu').addClass('hidden'); // Hide the dropdown
                    }
                });
                //popup message
                const sessionMessage = (s, m) => {
                    Swal.fire({
                        title: "Added Successfully!",
                        text: m,
                        icon: s
                    });
                }

                if ($status !== null) {
                    sessionMessage($status, $message)
                }
            })
        </script>
    @endsection
</x-app-layout>
