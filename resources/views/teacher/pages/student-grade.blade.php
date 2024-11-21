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


                        <div class="">
                            @include('teacher.table.grade', [
                                'student_grade' => $student_grade,
                                'student_id' => $student_id,
                            ])
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
    @include('teacher.modal.add_grade')
    @include('teacher.modal.edit_grade')
    @section('scripts')
        <script>
            $(document).ready(function() {
                console.log('subjects connected...')
                const errors = @json($errors->toArray());
                const success = @json(session('message'));
                const students = @json($students);
                console.log(students)
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
                        var subjectCode = $(this).data('code')
                            .toLowerCase(); // Get the data-code attribute and convert it to lowercase

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
                            $(this).stop(true, true).delay(index * 100).fadeIn(
                                100); // 100ms delay per card
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

                //add grade
                $('.add_quiz').click(function() {
                    // alert($(this).data('student_id'))
                    students.data.forEach(element => {
                        console.log(element)
                        if (parseInt($(this).data('student_id')) === parseInt(element.student_id)) {
                            // console.log(element)
                            let type = $(this).data('type');
                            $('#grade_type').val(type)
                            $('#passing_score')
                                .val(element.semester_grade && element.semester_grade.lp ? parseInt(
                                    element.semester_grade.lp) : '')
                                .attr('readonly', element.semester_grade && element.semester_grade.lp ?
                                    true : false);

                            $('#student_subject_id').val(parseInt(element.subject_id))
                            $('#student_id_input').val(parseInt(element.student_id))
                            $('#semester-input').val(element.semester + " semester")
                            
                            $('#grade-modal-btn').click();
                            // switch (type) {
                            //     case 'quiz':
                            //         break;
                            
                            //     default:
                            //         break;
                            // }

                        }
                    });
                })

                $('.edit_student_grade').click(function(){
                    let quiz_id = $(this).data('quiz_id')
                    let quiz_score = $(this).data('score')
                    let student_id = $(this).data('student_id')
                    let grade_type = $(this).data('type')

                    $('#grade_id_input_edit').val(parseInt(quiz_id))
                    $('#student-grade-edit').val(parseInt(quiz_score))
                    $('#student_id_input_edit').val(parseInt(student_id))
                    $('#grade_type_input_edit').val(grade_type)
                    console.log(quiz_id,quiz_score)
                    // let subject_id = $(this).data('subject_id')
                    // let semester = $(this).data('semester')
                    // let grade_id = $(this).data('grade_id')
                    // let student_grade = $(this).data('grade')
                    // // alert($(this).data('grade_id'))
                    // $('#grade_id_input_edit').val(grade_id)
                    // $('#student_id_input_edit').val(student_id)
                    // $('#student_subject_id_edit').val(subject_id)
                    // $('#semester-input-edit').val(semester)
                    // $('#student-grade-edit').val(student_grade)
                    $('#edit_grade-modal-btn').click()
                })

            })
        </script>
    @endsection


</x-app-layout>
