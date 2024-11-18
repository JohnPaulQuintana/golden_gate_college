<x-app-layout>
    <div class="w-full">
        <div class="mx-auto">
            {{-- header --}}
            <div
                class="bg-sidebar overflow-hidden shadow-sm mb-2 sm:rounded-lg flex flex-col md:flex-row justify-between items-center">
                <div class="p-4 text-white text-xl">
                    {{ __('Welcome to ') }} {{ Auth::user()->role }}
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

            {{-- dahboard content --}}
            <div class="bg-white overflow-hidden shadow-sm rounded p-2">
                <div class="flex items-center justify-between">
                    <span class="flex items-center justify-between gap-2 font-bold ps-2 text-xl text-green">
                        Class Schedules for Class
                        {{ date('Y') }} - {{ date('Y') + 1 }}
                    </span>
                    @php
                        $buttonRendered = false; // Initialize a flag
                    @endphp

                    @foreach ($uploadedScheduled as $sched)
                        @if ($sched->dean_id === Auth::user()->id && !$buttonRendered)
                            <button id="plus-sched"
                                class="flex items-center gap-1 bg-slate-100 rounded-md p-1 hover:cursor-pointer">
                                <svg class="size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 448 512">
                                    <!--! Font Awesome Free 6.6.0 -->
                                    <path
                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                                </svg>
                                <span class="text-red-500">create</span>
                            </button>
                            @php
                                $buttonRendered = true; // Set the flag to true after rendering the button
                            @endphp
                        @endif
                    @endforeach
                </div>
                <div class="p-2">
                    <!-- Timeline -->
                    <div>

                        @foreach ($uploadedScheduled as $sched)
                            <!-- Item -->
                            <div class="group relative flex gap-x-5">
                                <!-- Icon -->
                                <div
                                    class="relative group-last:after:hidden after:absolute after:top-8 after:bottom-2 after:start-3 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                                    <div class="relative z-10 size-6 flex justify-center items-center">
                                        <svg class="shrink-0 size-6 text-red-500 dark:text-neutral-200"
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
                                        {{ $sched->created_at }}
                                    </h3>

                                    <p
                                        class="bg-slate-100 font-semibold text-xl w-fit px-2 rounded-sm text-green dark:text-neutral-200 capitalize">

                                        @php
                                            $yearText = '';
                                            switch ((int) $sched->college_level) {
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
                                        @endphp
                                        {{ $sched->program }}
                                    </p>

                                    <p
                                        class="bg-slate-100 font-semibold text-sm w-fit px-2 rounded-sm text-slate-700 dark:text-neutral-200 capitalize">
                                        Section: {{ $sched->section }} </p>
                                    <p
                                        class="bg-slate-100 font-semibold text-sm w-fit px-2 rounded-sm text-slate-700 dark:text-neutral-200 capitalize">
                                        College Level: {{ $yearText }} </p>
                                    <p
                                        class="bg-slate-100 font-semibold text-sm w-fit px-2 rounded-sm text-slate-700 dark:text-neutral-200 capitalize">
                                        College Level: | {{ $sched->semester }} Semester </p>

                                    <ul class="list-disc ms-6 mt-3 space-y-1.5">
                                        <li class="ps-1 text-sm text-gray-600 dark:text-neutral-400">
                                            {{ $sched->descriptions }}
                                        </li>
                                        <li class="ps-1 text-sm text-gray-600 dark:text-neutral-400">
                                            <div class="w-full md:w-[300px] overflow-hidden relative group">
                                                <!-- Image with hover scaling -->
                                                <img class="transition-transform duration-300 ease-in-out transform group-hover:scale-110"
                                                    src="{{ asset($sched->class_schedule) }}" alt="">

                                                <!-- Centered button, initially hidden and fades in on hover -->
                                                <div
                                                    class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out 
                                                      absolute inset-0 flex gap-2 items-center justify-center bg-black bg-opacity-50">
                                                    <!-- Download Button -->
                                                    <a href="{{ asset($sched->class_schedule) }}"
                                                        download="{{ basename($sched->class_schedule) }}"
                                                        class="flex items-center justify-center bg-white text-gray-800 py-2 px-4 rounded shadow-lg hover:bg-gray-200">
                                                        Download
                                                    </a>
                                                    @if ($sched->dean_id === Auth::user()->id)
                                                        <button
                                                            class="bg-white update-sched text-gray-800 py-2 px-4 rounded shadow-lg hover:bg-gray-200">
                                                            Update
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>

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
    @include('scheduled.modal.create-schedule')
    {{-- @include('scheduled.modal.open-schedule') --}}
    @section('scripts')
        <script>
            $(document).ready(function() {
                console.log('connected...')
                let $infos = @json($infos);
                let message = @json(session('message'));
                let uploadedScheduled = @json($uploadedScheduled);
                let baseUrl = window.location.origin;
                if (message !== null) {
                    Swal.fire({
                        title: "Uploaded Successfully.",
                        text: message,
                        icon: "success"
                    });
                }
                console.log($infos)

                // $('.open-sched').click(function(){
                //     // alert($(this).data('schedule_id'))
                //     let scheduleId = $(this).data('schedule_id')
                //     let sched = ''
                //     uploadedScheduled.forEach(sch => {
                //         console.log(sch)
                //         if(parseInt(sch.id) === parseInt(scheduleId)){
                //             sched = sch.class_schedule
                //         }
                //     });

                //     $('iframe').attr('src',`${baseUrl}/${sched}`)
                //     $('#open_schedule_btn_modal').click()
                // })

                $('#plus-sched').click(function() {
                    let degreeOption = '<option value="">Select degree</option>'

                    $infos.forEach(info => {
                        degreeOption += `
                  <option value="${info.id}">${info.program} - ${info.abbrev}</option>
                `
                    });

                    $('.degree-option').html(degreeOption)
                    $('#create_schedule_btn_modal').trigger('click')
                    // alert('yes')
                })
            })
        </script>
    @endsection
</x-app-layout>
