<x-app-layout>

    <div class="w-full">
        <div class="mx-auto">
            {{-- header --}}
            <div
                class="bg-sidebar overflow-hidden shadow-sm mb-2 sm:rounded-lg flex flex-col md:flex-row justify-between items-center">
                <div class="p-4 text-white text-md capitalize">
                    {{ __('Welcome to Student Section ') }}{{ Auth::user()->role }}
                </div>

                <div class="hs-dropdown relative z-[999] inline-flex">
                    <button id="hs-dropdown-custom-trigger" type="button"
                        class="hs-dropdown-toggle py-1 ps-1 pe-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-full focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        {{-- <img class="w-8 h-auto rounded-full" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Avatar"> --}}
                        <span
                            class="w-7 h-7 border text-sm border-[#bc9c22] bg-[#bc9c22] rounded-full flex justify-center items-center font-bold text-green">{{ $initial }}</span>
                        <span
                            class="text-white font-medium truncate max-w-[4.5rem] dark:text-neutral-400">{{ auth()->user()->name }}</span>
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

                <div class="mb-2">
                    <!-- Card Blog -->
                    <div class="max-w-[85rem] mx-auto">
                        <!-- Grid -->
                        <div class="flex items-center justify-between mb-2 bg-white p-2">
                            <h1 class="flex-1 font-bold text-green uppercase tracking-wider">List of Student Registered
                            </h1>
                            <div class="flex-1 flex gap-2 items-end justify-end">
                                <div class="relative">
                                    <input id="search" type="text"
                                        class="peer py-2 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Enter student number">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                                        </svg>

                                    </div>
                                </div>

                                <div class="relative">
                                    <select id="degree-filter" name="degree"
                                        class="peer py-2 pe-0 ps-8 w-[100px] bg-gray-100 rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                        <option value="">Filters</option>
                                        @foreach ($degrees as $degree)
                                            <option value="{{ $degree->program }}">{{ $degree->program }}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M3.9 54.9C10.5 40.9 24.5 32 40 32l432 0c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9 320 448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6l0-79.1L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                                        </svg>

                                    </div>
                                </div>

                                {{-- <div class="relative">
                                    <select id="tag-filter" name="degree"
                                        class="peer py-2 pe-0 ps-8 w-[100px] bg-gray-100 rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                        <option value="">Tag</option>
                                        @foreach ($degrees as $degree)
                                            <option value="{{ $degree->abbrev }}">{{ $degree->program }}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M3.9 54.9C10.5 40.9 24.5 32 40 32l432 0c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9 320 448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6l0-79.1L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>
                                        
                                    </div>
                                </div> --}}

                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-5 gap-1">
                            @foreach ($students as $student)
                                @include('student-records.cards.profile', [
                                    'student' => $student,
                                    'liabilities' => count($liabilities),
                                ])
                            @endforeach
                        </div>
                        <!-- End Grid -->
                    </div>
                    <!-- End Card Blog -->

                </div>

                <div class="">
                    {{-- @include('liabilities.tables.liabilities', ['liabilities' => $liabilities]) --}}
                </div>

            </div>
        </div>
    </div>
    @include('modal.liability-list')
    @section('scripts')
        <script>
            $(document).ready(function() {
                console.log('liabilities connected...')
                const errors = @json($errors->toArray());
                const success = @json(session('message'));
                const liabilities = @json($liabilities);

                console.log(liabilities)
                if (success === 'enrolled') {
                    Swal.fire({
                        title: "Successfully Enrolled!",
                        text: success,
                        icon: "success"
                    });
                }
                if (success != 'enrolled' && success) {
                    Swal.fire({
                        title: "Successfully Created!",
                        text: success,
                        icon: "success"
                    });
                }
                if (errors.liabilities_description) {
                    Swal.fire({
                        title: "Failed to create!",
                        text: "Check your input, description is required to continue!",
                        icon: "error"
                    });
                    // $('#liabilities_create_btn').trigger('click')
                }

                // search student base on student number
                $('#search').on('input', function() {
                    const studentNumber = $(this).val().toLowerCase();

                    $('.student-item').each(function() {
                        const item = $(this).data('id'); // Get the data-id attribute
                        const itemString = String(item); // Convert to string
                        const isMatch = itemString.includes(
                        studentNumber); // Check if the string includes the search term
                        $('.student-list-card').toggle(isMatch); // Show or hide based on match
                    });
                })

                // filtes based on degree
                $('#degree-filter').on('change', function() {
                    const studentNumber = $('#search').val().toLowerCase();
                    const selectedDegree = $('#degree-filter').val();

                    $('.student-item').each(function() {
                        const itemDegree = $(this).data('degree');
                        const isDegreeMatch = selectedDegree ? itemDegree === selectedDegree :
                        true; // Check if degree matches, or show all if none selected

                        $('.student-list-card').toggle(
                        isDegreeMatch); // Show or hide based on both matches
                    });
                })

                $('.enrollbutton').on('click', function(event) {
                    // alert('yes')
                    event.preventDefault(); // Prevents the default action (navigation)

                    const href = $(this).attr('href'); // Get the link URL

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to enroll this student?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, enroll!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = href; // Proceed with the action if confirmed
                        }
                    });
                });

                // liabilities list btn
                // $('#liabilities_modal_btn').trigger('click')
                $('.liability-list-btn').click(function() {
                    // alert('clicked...')
                    let html = ''
                    let name = $(this).data('name')
                    let program = $(this).data('program')
                    let user_id = $(this).data('user_id')
                    let baseUrl = window.location.origin;
                    console.log(program)
                    $('#hs-modal-liabilities-create-label').text(`${name}`)
                    $('h3 hs-modal-course').text(`${program}`)



                    liabilities.forEach(liability => {

                        html += `
                            <div class="bg-slate-50 p-2 rounded-sm shadow flex flex-col gap-2">
                                <p class="text-green">${liability.liabilities_description} Amounting Php ${liability.ammount}.</p>
                                <span class="text-xs capitalize">${liability.semester} Semester/ ${liability.academic_year}</span>
                                <div class="flex items-center justify-between py-1">
                                    <span class="text-xs capitalize">Posted by: ${liability.role} - ${liability.created_at}</span>
                                `
                        // Check if the user has a tag for this liability
                        let userTagged = false;
                        let tag_id = []
                        liability.tags.forEach(tag => {
                            tag_id.push(parseInt(tag.user_id))
                            if (parseInt(tag.user_id) === parseInt(user_id) && tag.status ===
                                'paid') {
                                console.log(tag.user_id, user_id)
                                userTagged = true;
                            }
                        });

                        if (!tag_id.includes(parseInt(user_id))) {
                            console.log('Already Paid or newly registered')
                            userTagged = true;
                        }

                        // Display "Paid" if the user is tagged, otherwise show the "Un-Tag" button
                        if (userTagged) {
                            html += `
                                <a class="bg-sidebar text-white text-sm rounded-sm px-1 cursor-default">Paid</a>
                            `;
                        } else {
                            html += `
                                <a href="${baseUrl}/registrar/untag/${liability.id}/user/${user_id}" class="bg-red-500 text-white text-sm rounded-sm hover:bg-red-700 px-1">Un-Tag</a>
                            `;
                        }

                        html += `
                                </div> 
                            </div>
                        `;


                    });

                    $('#liabilities-card').html(html)
                    $('#liabilities_modal_btn').trigger('click')
                })

            })
        </script>
    @endsection
</x-app-layout>
