<x-app-layout>

    <div class="w-full">
        <div class="mx-auto">
            {{-- header --}}
            <div
                class="bg-sidebar overflow-hidden shadow-sm mb-2 sm:rounded-lg flex flex-col md:flex-row justify-between items-center">
                <div class="p-4 text-white text-xl">
                    {{ __('Available Programs') }}
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
                            href="#">
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
                <div class="mb-2 text-green flex justify-between items-center">
                    <span class="flex items-center gap-2">
                        <a href="{{ route('registrar.program') }}">
                            <svg class="size-4 text-red-500 hover:cursor-pointer hover:text-red-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M459.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29l0-320c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4L288 214.3l0 41.7 0 41.7L459.5 440.6zM256 352l0-96 0-128 0-32c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160C4.2 237.5 0 246.5 0 256s4.2 18.5 11.5 24.6l192 160c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29l0-64z"/></svg>
                        </a>
                        These is the available year level created by dean department.
                    </span>
                    <!-- Select -->
                    <div class="relative">
                        <!-- Button for Dropdown -->
                        <button id="custom-filter-button" type="button"
                            class="flex justify-between items-center w-full py-2 px-4 bg-white rounded-lg border border-gray-200 shadow-sm text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                            <span class="inline-flex items-center">
                                <svg class="shrink-0 w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                                </svg>
                                Filter
                            </span>
                            <svg class="shrink-0 w-4 h-4 text-gray-500 dark:text-neutral-500"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M7 9l5-5 5 5M7 15l5 5 5-5" />
                            </svg>
                        </button>
                    
                        <!-- Dropdown Menu -->
                        <div id="custom-filter-menu"
                            class="hidden absolute z-50 left-0 right-0 mt-2 w-full max-h-64 bg-white border border-gray-200 rounded-lg shadow-lg overflow-auto dark:bg-neutral-900 dark:border-neutral-700">
                            <div class="py-2">
                                <!-- Options -->
                                @foreach ($year_levels as $item)
                                    <div class="flex justify-between items-center w-full px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-neutral-800">
                                        <span>{{ $item->formatted_level }}</span>
                                        <span class="hidden"><svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
                                    </div>
                                @endforeach
                                
                                
                            </div>
                        </div>
                    </div>
                    
                    <!-- End Select -->
                </div>
                {{-- @include('registrar.card.program', ['programs' => $programs]) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach ($year_levels as $item)
                        <div data-year_level_id="{{ $item->id }}"
                            data-year_level_selected_ids="{{ $item->selected_subject_ids }}"
                            class="year_level_edit_btn bg-white border rounded-md border-green-700 mb-2 shadow-sm sm:flex dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70 transition ease-in-out delay-150 hover:scale-105 hover:cursor-pointer ">
                            {{-- <div class="shrink-0 relative w-full rounded-t-xl overflow-hidden pt-[40%] sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-xs">
                              <img class="size-full absolute top-0 start-0 object-cover" src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Card Image">
                            </div> --}}
                            <div class="flex flex-wrap">
                                <div class="p-2 flex flex-col h-full sm:p-3">
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                        {{ $item->formatted_level }} | {{ $item->program }}
                                    </h3>
                                    <span class="text-sm border-b-2 text-slate-500">code | subject | credits</span>
                                    <div class="py-2">
                                        
                                        @foreach ($item->subjects as $subject)
                                            <span
                                                class="border-b-1 border-green-700 flex items-center gap-2 text-green text-sm w-full">
                                                <svg class="size-3" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor"
                                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                </svg>
                                                {{ $subject->subject_code }} | {{ $subject->subject_name }} |
                                                {{ $subject->credits }}
                                            </span>
                                        @endforeach
                                    </div>
                                    <div class="mt-5 sm:mt-auto flex items-center justify-between">
                                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                                            {{ $item->created_at }}
                                        </p>
                                        <div>
                                            <a href="#"
                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-red-500 text-white shadow-sm hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                                Enroll Student
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            $(document).ready(function() {
                console.log('adding student connected...')
                $status = @json(session('status'));
                $message = @json(session('message'));

                $('#custom-filter-button').on('click', function() {
                    $('#custom-filter-menu').toggleClass('hidden');
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
