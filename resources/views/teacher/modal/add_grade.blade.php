<div class="text-center">
    <button id="grade-modal-btn" type="button"
        class="hidden py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
        aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-grade-modal" data-hs-overlay="#hs-grade-modal">
        Open modal
    </button>
</div>

<div id="hs-grade-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[9999] overflow-x-hidden overflow-y-auto" role="dialog"
    tabindex="-1" aria-labelledby="hs-grade-modal-label">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto">
        <form action="{{ route('teacher.student.grade') }}" method="post">
            @csrf
            <input type="number" name="student_id" id="student_id_input" class="hidden">
            <input type="number" name="subject_id" id="student_subject_id" class="hidden ">
            <input type="text" name="grade_type" id="grade_type" class="hidden">
            <div
                class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-grade-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 overflow-y-auto">
                    <div class="mb-6 text-center">
                        <h3 id="hs-grade-modal-label"
                            class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
                            Submit Student Grade to this Subject
                        </h3>
                        <p class="text-gray-500 dark:text-neutral-500">
                            Once the student grade is submitted, it's available to them.
                        </p>
                    </div>

                    <div id="" class="space-y-4 grid grid-cols-1 gap-2 overflow-y-auto">

                        <!-- Card -->
                        <div class="relative bg-white shadow-lg rounded-lg p-6 flex flex-col items-start transform">
                            {{-- Semester --}}
                            <div class="mb-2 w-full">
                                <label for="Semester Grade">Semester:</label>
                                <div class="relative uppercase">
                                    <input id="semester-input" name="semester" type="text"
                                        class="peer py-2 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Enter Student Grade" readonly>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            {{-- grade --}}
                            <div class="mb-2 w-full">
                                <label for="Semester Grade">Student Score:</label>
                                <div class="relative">
                                    <input id="search-subjects" name="student_score" type="number" step="0.01"
                                        class="peer py-2 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Enter Student Score" required>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            {{-- passing score --}}
                            <div class="mb-2 w-full">
                                <label for="Semester Grade">L.P:</label>
                                <div class="relative">
                                    <input name="passing_score" id="passing_score" type="number" step="0.01"
                                        class="peer py-2 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Enter Passing Point" required>
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z" />
                                        </svg>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Card -->

                    </div>
                </div>

                <div
                    class="flex justify-between items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-neutral-950 dark:border-neutral-800">

                    <button type="button"
                        class="cancelBtn py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                        data-hs-overlay="#hs-grade-modal">
                        Cancel
                    </button>
                    <button
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border shadow bg-white text-green disabled:opacity-50 disabled:pointer-events-none"
                        href="#">
                        Submit Student Score
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
