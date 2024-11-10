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
                            <h1 class="flex-1 font-bold text-green uppercase tracking-wider">List of Available Subjects
                                Registered
                            </h1>
                            <div class="flex-1 flex gap-2 items-end justify-end">
                                <div class="hs-dropdown relative inline-flex">
                                    <button id="hs-dropdown-with-title" type="button" class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                      Selected: <span id="selected-subjects">0</span>
                                      <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                                    </button>
                                  
                                    <div class="hs-dropdown-menu z-[9999] transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 divide-y divide-gray-200 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-title">
                                      <div class="selected-card-subject p-1 space-y-0.5">
                                        
                                      </div>
                                      <div class="p-1 space-y-0.5">
                                            <button id="save-subjects" type="button" class="text-center w-full p-1 hover:text-green">Save Subjects</button>
                                      </div>
                                    </div>
                                  </div>

                                <div class="relative">
                                    <input id="search-subjects" type="text"
                                        class="peer py-2 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Enter subject code">
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
                                    <select id="subject-filter" name="subject"
                                        class="peer py-2 pe-0 ps-8 w-[100px] bg-gray-100 rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                                        <option value="">Level</option>
                                        
                                         
                                        @foreach ($teacher->year_level_groups as $subjects)
                                            @php
                                                $yearLevel = $subjects->year_level; // Assuming $year holds the numeric value (1, 2, 3, 4)
                                            @endphp
                                            @switch($yearLevel)
                                                @case(1)
                                                    <option value="{{ $yearLevel }}" data-year_level="{{ $yearLevel }}">First Year</option>
                                                    @break
                                                @case(2)
                                                    <option value="{{ $yearLevel }}" data-year_level="{{ $yearLevel }}">Second Year</option>
                                                    @break
                                                @case(3)
                                                    <option value="{{ $yearLevel }}" data-year_level="{{ $yearLevel }}">Third Year</option>
                                                    @break
                                                @case(4)
                                                    <option value="{{ $yearLevel }}" data-year_level="{{ $yearLevel }}">Fourth Year</option>
                                                    @break
                                                @default
                                                    <option value="{{ $yearLevel }}" data-year_level="{{ $yearLevel }}">Unknown Year Level</option>
                                            @endswitch
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M3.9 54.9C10.5 40.9 24.5 32 40 32l432 0c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9 320 448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6l0-79.1L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                            @foreach ($teacher->year_level_groups as $subjects)
                                {{-- {{ $subject }} --}}
                                @foreach ($subjects->subjects as $item)
                                    {{-- {{ $item }} --}}
                                    @include('teacher.cards.subject', [
                                        'subject' => $item,
                                        'year' => $subjects->year_level,
                                    ])
                                @endforeach
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
    @section('scripts')
        <script>
            $(document).ready(function() {
                console.log('subjects connected...')
                const errors = @json($errors->toArray());
                const success = @json(session('message'));

                // console.log(liabilities)
                if (success) {
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

                // search
                $('#search-subjects').on('input', function() {
                    var searchQuery = $(this).val().toLowerCase(); // Get the input value in lowercase
                    console.log(searchQuery)
                    // Loop through each subject card
                    $('.subject-card').each(function() {
                        var subjectCode = $(this).data('code').toLowerCase(); // Get the data-code attribute and convert it to lowercase

                        // Check if the data-code includes the search query
                        if (subjectCode.indexOf(searchQuery) !== -1) {
                            $(this).show(); // Show the card if it matches
                        } else {
                            $(this).hide(); // Hide the card if it does not match
                        }
                    });

                })

                // filter
                $('#subject-filter').on('change', function() {
                    var selectedYear = $(this).val();
                    console.log('Selected Year:', selectedYear); // Log the selected value for debugging
                    
                    $('.subject-card').each(function(index) {
                        var level = $(this).data('level');
                        console.log('Subject Level:', level); // Log the level for debugging

                        // Convert both to integers before comparison
                        if (parseInt(selectedYear) === parseInt(level) || selectedYear === '') {
                            console.log('Match found, showing card'); // Debugging match
                            $(this).stop(true, true).delay(index * 100).fadeIn(100); // 100ms delay per card
                        } else {
                            console.log('No match, hiding card'); // Debugging non-match
                            $(this).fadeOut(100); // Hide the card with an animation
                        }
                    });
                });


                const college = (level) => {
                    switch (level) {
                        case 1:
                            return [level,"First Year"]
                        case 2:
                            return [level,"Second Year"]
                        case 3:
                            return [level,"Third Year"]
                        case 4:
                            return [level,"Forth Year"]
                        default:
                            return []
                            break;
                    }
                }

                //selected subject collection
                let selectedSubjects = [];
                // Capture the click event on the Select button
                $('.select-button').on('click', function() {
                    var subjectId = $(this).data('subject_id');
                    var subjectName = $(this).data('subject_name'); // Get the subject name from the card
                    var subjectCode = $(this).data('code'); // Get the subject name from the card
                    var collegeLevel = $(this).data('college_level'); // Get the subject name from the card
                    var subjectCard = $(this).closest('.subject-card'); // Get the parent subject card
                    console.log(subjectId, subjectName,subjectCode)
                    // Toggle the "selected" class on the subject card
                    subjectCard.toggleClass('selected');

                    // If the subject card is selected, add it to the selectedSubjects array
                    if (subjectCard.hasClass('selected')) {
                         // Check if the subject is already in the selectedSubjects array
                        if (!selectedSubjects.some(subject => subject.id === subjectId)) {
                            selectedSubjects.push({
                                id: subjectId,
                                'college_level': college(collegeLevel),
                                subject_name: subjectName,
                                subject_code: subjectCode
                            });
                        }
                    } else {
                        // If the subject card is deselected, remove it from the selectedSubjects array
                        selectedSubjects = selectedSubjects.filter(function(subject) {
                            return subject.id !== subjectId;
                        });
                    }

                    // Log the selected subjects (for debugging purposes)
                    console.log('Selected Subject IDs:', selectedSubjects);
                    let html = `<span class="block pt-2 pb-1 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-500">
                                          Selected Subjects
                                    </span>`
                    // Optionally, you can update the button text to reflect the selection state
                    if (subjectCard.hasClass('selected')) {
                        $('#selected-subjects').text(selectedSubjects.length)
                        
                        selectedSubjects.forEach(element => {
                            html += `
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                                      ${element.subject_name} - ${element.subject_code}
                                    </a>
                            `
                        });

                        $('.selected-card-subject').html(html)
                        $(this).text('Deselect').removeClass('text-green').addClass('text-red-500'); // Change button text to "Deselect"
                    } else {
                        $('#selected-subjects').text(selectedSubjects.length)
                        selectedSubjects.forEach(element => {
                            html += `
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                                        ${element.subject_name} - ${element.subject_code}
                                    </a>
                            `
                        });

                        $('.selected-card-subject').html(html)
                        $(this).text('Select').removeClass('text-red-500').addClass('text-green'); // Change button text back to "Select"
                    }
                });

                $('#save-subjects').click(function(){
                    // alert(selectedSubjects.length)
                    if(selectedSubjects.length <= 0){
                        Swal.fire({
                            title: "Subjects is required!",
                            text: "You don't have a subjects selected!",
                            icon: "error"
                        });
                    }

                    let baseUrl = window.location.origin;
                    // Send the selected subjects to the server asynchronously
                    $.ajax({
                        url: `${baseUrl}/teacher/save-selected-subjects`, // The server endpoint you want to send the data to
                        method: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token for Laravel
                            selectedSubjects: selectedSubjects // Send the selected subjects as an object
                        },
                        success: function(response) {
                            // Handle the server response if needed
                            console.log('Server Response:', response);
                            if(response.status === 'success'){
                                Swal.fire({
                                    title: "Saved Successfully!",
                                    text: response.message,
                                    icon: response.status
                                });  
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle any errors
                            console.error('AJAX Request Failed:', error);
                        }
                    });
                })
            })
        </script>
    @endsection


</x-app-layout>
