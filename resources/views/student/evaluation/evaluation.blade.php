<x-app-layout>

    <div class="w-full">
        <div class="mx-auto">
            {{-- header --}}
            <div
                class="bg-sidebar overflow-hidden shadow-sm mb-2 sm:rounded-lg flex flex-col md:flex-row justify-between items-center">
                <div class="p-4 text-[#bc9c22] text-sm uppercase">
                    <span>{{ __('Your gateway to success, welcome back, goldenian!') }}</span>
                </div>

                <div class="hs-dropdown relative inline-flex">
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
                            href="{{ route('profile.edit') }}">
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

            <div class="border p-2 grid grid-cols-1 md:grid-cols-4">
                @foreach ($teachers as $item)
                    <div class="shadow border bg-white rounded-md flex flex-col gap-2 items-center justify-center p-4">
                        <img src="https://media.istockphoto.com/id/1437816897/photo/business-woman-manager-or-human-resources-portrait-for-career-success-company-we-are-hiring.jpg?s=612x612&w=0&k=20&c=tyLvtzutRh22j9GqSGI33Z4HpIwv9vL_MZw_xOE19NQ="
                            alt="no Image" class="border w-[50%] h-[100px] rounded-md" srcset="">

                        <h1>{{ $item->name }}</h1>
                        <h1>{{ $item->email }}</h1>

                        @if (!$item->has_ratings)
                            <button data-id="{{ $item->teacher_id }}" type="button"
                                class="evaluate_btn bg-red-500 p-1 rounded-md text-white hover:bg-red-700">Evaluate</button>
                            
                        @else
                            <button disabled data-id="{{ $item->teacher_id }}" type="button"
                                class="evaluate_btn bg-sidebar p-1 rounded-md text-white">Completed</button>
                        @endif
                        {{-- <h1>Subject : email@example.com</h1> --}}
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>

    @include('student.modal.evaluation-form')
    @section('scripts')
        <script>
            $(document).ready(function() {
                let teachers = @json($teachers);
                let status = @json(session('status'));
                let message = @json(session('message'));
                console.log(teachers)
                if (status !== null) {
                    Swal.fire({
                        title: "Status of Submitted Evaluation!",
                        text: message,
                        icon: status
                    });
                }

                $('.evaluate_btn').click(function() {
                    let html = ''
                    teachers.forEach(element => {
                        console.log(element)
                        if (parseInt(element.teacher_id) === parseInt($(this).data('id'))) {
                            $('.teacher_name').text(element.name)
                            $('.teacher_email').text(element.email)
                            $('.teacher_id').val(element.teacher_id)
                            $('.subject_id').val(element.subject_id)
                            element.categories.forEach(category => {
                                console.log(category)
                                html += `
                                    <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-800 dark:after:border-neutral-800">
                                        ${category.category}
                                    </div>
                                    <!-- Question -->
                                    <div class="ps-10 mb-5">
                                        <label for="question" class="block text-gray-700 font-medium">Question : ${category.question}</label>
                                        <!-- Ratings -->
                                        <div>
                                            <label class="block text-gray-700 font-medium">Ratings</label>
                                            <div class="space-y-2 mt-2">
                                            <label class="flex items-center">
                                                <input type="radio" name="rating_${category.id}" value="${category.evaluation_id}|1" class="text-indigo-600 focus:ring-indigo-500" />
                                                <span class="ml-2">1 - Poor</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="radio" name="rating_${category.id}" value="${category.evaluation_id}|2" class="text-indigo-600 focus:ring-indigo-500" />
                                                <span class="ml-2">2 - Fair</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="radio" name="rating_${category.id}" value="${category.evaluation_id}|3" class="text-indigo-600 focus:ring-indigo-500" />
                                                <span class="ml-2">3 - Good</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="radio" name="rating_${category.id}" value="${category.evaluation_id}|4" class="text-indigo-600 focus:ring-indigo-500" />
                                                <span class="ml-2">4 - Very Good</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="radio" name="rating_${category.id}" value="${category.id}|5" class="text-indigo-600 focus:ring-indigo-500" />
                                                <span class="ml-2">5 - Excellent</span>
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Comments -->
                                    <div class="ps-10 mb-5">
                                        <label for="comments[]" class="block text-gray-700 font-medium">Comments</label>
                                        <textarea 
                                        
                                        name="comments_${category.id}" 
                                        rows="4"
                                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2.5"
                                        placeholder="Share your thoughts..."
                                        ></textarea>
                                    </div>
                                `
                            });


                        }
                    });

                    $('.category-container').html(html)
                    $('#evaluation_form_btn').click()
                    // alert($(this).data('id'))
                })
            })
        </script>
    @endsection
</x-app-layout>
