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
                            <h1 class="flex-1 font-bold text-green uppercase tracking-wider">My Student Registered on this Subjects
                                {{ $subject->subject_name }}
                            </h1>
                            <div class="flex-1 flex gap-2 items-end justify-end">
                                

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
                                        {{-- @foreach ($my_subjects as $ms)
                                            <option value="{{ $ms->college_level_number }}" data-year_level="{{ $ms->college_level_number }}">{{ $ms->college_level_name }}</option>
                                        @endforeach --}}
                                    </select>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M3.9 54.9C10.5 40.9 24.5 32 40 32l432 0c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9 320 448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6l0-79.1L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="">
                            @include('teacher.table.student', ['students' => $students])
                            {{-- @foreach ($my_subjects as $ms)
                                @include('teacher.cards.my-subject', ['subject'=>$ms])
                            @endforeach --}}
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
    @include('teacher.modal.enroll')
    @section('scripts')
        <script>
            $(document).ready(function() {
                console.log('subjects connected...')
                const errors = @json($errors->toArray());
                const success = @json(session('message'));
                // console.log(department_info)
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

                const levelName = (n) => {
                    switch (n) {
                        case 1:
                            return "First Year"
                        case 2:
                            return "Second Year"
                        case 3:
                            return "Third Year"
                        case 4:
                            return "Forth Year"
                    
                        default:
                            return ""
                    }
                }

                //enroll student to my subjects
                $('.enrolled-button').click(function(){
                    let subject_id = $(this).data('my_subject_id')
                    let html = ''
                    department_info.enrolled.forEach(element => {
                        // console.log(element)
                        html += `
                            <div data-student_no="${element.student_no}" class="enrolled-card relative bg-white border shadow-lg rounded-lg p-6 flex flex-col items-start transition-all duration-300 hover:shadow-xl transform">
                                <!-- Icon Section -->
                                <svg class="w-12 h-12 mx-auto text-green mb-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                                <!-- Subject Title and Details -->
                                <div class="mb-6 flex-1">
                                    <!-- Subject Title -->
                                    <h3 class="subject_name text-base font-semibold text-green mb-2 px-3 uppercase">${element.fullname}</h3>
                            
                                    <!-- Subject Code -->
                                    <p class="text-sm text-gray-600 text-left px-3"><span class="subject_code font-medium">${element.program}</span></p>
                                    <p class="text-sm text-gray-600 text-left px-3">Student No.: <span class="subject_code font-medium">${element.student_no}</span></p>
                                    <p class="text-sm text-gray-600 text-left px-3">Semester: <span class="subject_code font-medium capitalize">${element.semester} | ${element.academic_year}</span></p>
                            
                                    <!-- Year Level -->
                                    <p class="text-sm text-gray-600 text-left px-3">
                                        Level: ${levelName(element.year_level)}
                                    </p>
                                </div>
                            
                                <!-- Select and Credits Button Section -->
                                <div class="absolute left-0 bottom-0 w-full flex items-center">
                                    <!-- Select Button -->
                                    <button data-student_id="${element.user_id}" class="enrolled-button flex-1 bg-slate-50 border text-green px-4 py-2 hover:bg-slate-100 transition-colors duration-300 focus:outline-none">
                                        Select Student
                                    </button>
                                    
                                </div>
                            </div>
                        `
                    });
                    $('#enrolled-student-card').html(html)
                    // enroll students
                    $('#enroll-modal-btn').click()

                    // search
                    $('#search-student').on('input', function(){
                        var searchQuery = $(this).val(); // Get the input value in lowercase
                        console.log(searchQuery)
                        $('.enrolled-card').each(function() {
                            var subjectNo = $(this).data('student_no');
                            console.log(subjectNo)
                            // Check if the data-code includes the search query
                            if (subjectNo.toString().indexOf(searchQuery) !== -1) {
                                $(this).show(); // Show the card if it matches
                            } else {
                                $(this).hide(); // Hide the card if it does not match
                            }
                        })
                    })

                    //marked as selected
                    //selected student collection
                    let selectedStudent = [];
                    $('.enrolled-button').on('click', function() {
                        let student_id = $(this).data('student_id');
                        var enrolledCard = $(this).closest('.enrolled-card'); // Get the parent subject card
                        console.log(student_id)
                        // Toggle the "selected" class on the subject card
                        enrolledCard.toggleClass('selected');
                        // If the subject card is selected, add it to the selectedSubjects array
                        if (enrolledCard.hasClass('selected')) {
                            // Check if the student is already in the selected array
                            if (!selectedStudent.some(student => student.id === student_id)) {
                                selectedStudent.push({
                                    student_id: student_id,
                                    subject_id: subject_id,
                                });

                                
                            }
                        } else {
                            // If the subject card is deselected, remove it from the selectedSubjects array
                            selectedStudent = selectedStudent.filter(function(student) {
                                // $('#student-count').text(selectedStudent.length)
                                return student.student_id !== student_id;
                            });
                        }
                        // Toggle the button text using .trim() to handle extra spaces
                        let buttonText = $(this).text().trim();
                        if (buttonText === 'Select Student') {
                            $(this).text('Deselect Student').removeClass('text-green').addClass('text-red-500'); // Change to "Deselect Student"
                        } else {
                            $(this).text('Select Student').removeClass('text-red-500').addClass('text-green'); // Change back to "Select Student"
                        }
                        $('#student-count').text(selectedStudent.length)
                        console.log('Selected Student IDs:', selectedStudent);
                    })

                    //save selected student
                    $('.save-selected-student').click(function(){
                        console.log(selectedStudent)
                        if(selectedStudent.length <= 0){
                            $('.cancelBtn').click()
                            Swal.fire({
                                title: "Subjects is required!",
                                text: "You don't have a subjects selected!",
                                icon: "error"
                            });
                            setTimeout(() => {
                                window.location.reload()
                            }, 3000);
                        }

                        let baseUrl = window.location.origin;
                        // Send the selected subjects to the server asynchronously
                        $.ajax({
                            url: `${baseUrl}/teacher/enrolled-student`, // The server endpoint you want to send the data to
                            method: 'POST',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token for Laravel
                                selectedStudents: selectedStudent // Send the selected subjects as an object
                            },
                            success: function(response) {
                                // Handle the server response if needed
                                console.log('Server Response:', response);
                                if(response.status === 'success'){
                                    $('.cancelBtn').click()
                                    Swal.fire({
                                        title: "Saved Successfully!",
                                        text: response.message,
                                        icon: response.status
                                    }); 
                                    setTimeout(() => {
                                        window.location.reload()
                                    }, 3000); 
                                }
                            },
                            error: function(xhr, status, error) {
                                // Handle any errors
                                console.error('AJAX Request Failed:', error);
                            }
                        });
                    })
                })

                // remove subjects
                $('.remove-button').click(function(){
                    let subject_id = $(this).data('my_subject_id')
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, remove it!"
                    }).then((result) => {
                        if (result.isConfirmed) {

                            let baseUrl = window.location.origin;
                            // Send the selected subjects to the server asynchronously
                            $.ajax({
                                url: `${baseUrl}/teacher/delete-subjects`, // The server endpoint you want to send the data to
                                method: 'POST',
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token for Laravel
                                    subject_id: subject_id // Send the selected subjects as an object
                                },
                                success: function(response) {
                                    // Handle the server response if needed
                                    console.log('Server Response:', response);
                                    if(response.status === 'success'){
                                        Swal.fire({
                                            title: "Subject Removed!",
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
                            
                        }
                    });

                })

                
            })
        </script>
    @endsection


</x-app-layout>
