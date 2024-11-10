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
                            <img class="w-[100px] h-[100px] rounded-full" src="{{ asset('img/profile-default.jpg') }}"
                                alt="" srcset="">
                        </div>
                        <div class="details flex flex-col uppercase">
                            <span class="font-bold">{{ $information->information->firstname }},
                                {{ $information->information->lastname }},
                                {{ $information->information->middlename }}</span>
                            <span class="text-sm">3rd Year, BSIT</span>
                            <span class="text-sm">Business Analytics</span>
                            <span class="text-sm">Second Semester AY 2023-2024</span>
                            <span class="text-sm text-[#bc9c22]">Enrolled</span>
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
                <span class="flex items-center justify-between gap-2 font-bold ps-2 text-xl text-green">Online
                    Enrollment Status Form for class
                    {{ date('Y') }} - {{ date('Y') +1 }}
                    <span id="status" class="text-white rounded-sm px-2"></span>
                </span>
                <div class="p-2">
                    <!-- Timeline -->
                    <div>

                        @foreach ($notifications as $item)
                            <!-- Item -->
                            <div class="group relative flex gap-x-5">
                                <!-- Icon -->
                                <div
                                    class="relative group-last:after:hidden after:absolute after:top-8 after:bottom-2 after:start-3 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                                    <div class="relative z-10 size-6 flex justify-center items-center">
                                        <svg class="shrink-0 size-6 text-green dark:text-neutral-200"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 12h.01" />
                                            <path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                                            <path d="M22 13a18.15 18.15 0 0 1-20 0" />
                                            <rect width="20" height="14" x="2" y="6" rx="2" />
                                        </svg>
                                    </div>
                                </div>
                                <!-- End Icon -->

                                <!-- Right Content -->
                                <div class="grow pb-8 group-last:pb-0">
                                    <h3 class="mb-1 text-xs text-gray-600 dark:text-neutral-400">
                                        {{ $item->created_at }}
                                    </h3>

                                    <p class="font-semibold text-sm {{ strtolower($item->type) === "application need to resubmit - registrar" ? "bg-red-500" : 'bg-sidebar' }} w-fit px-2 rounded-sm text-white dark:text-neutral-200 capitalize">
                                        {{ $item->type }}
                                    </p>

                                    <ul class="list-disc ms-6 mt-3 space-y-1.5">
                                        <li class="ps-1 text-sm text-gray-600 dark:text-neutral-400">
                                            {{ $item->message }}
                                        </li>
                                        
                                    </ul>
                                </div>
                                <!-- End Right Content -->
                            </div>
                            <!-- End Item -->
                        @endforeach

                    </div>
                    <!-- End Timeline -->
                </div>
            </div>


        </div>
    </div>
    @include('student.modal.found')
    @section('scripts')
        <script>
            $(document).ready(function() {
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
            })
        </script>
    @endsection
</x-app-layout>
