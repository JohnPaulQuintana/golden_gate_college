<x-app-layout>
    @section('links')
        <link rel="stylesheet" href="./node_modules/apexcharts/dist/apexcharts.css">
    @endsection
    <div class="w-full">
        <div class="mx-auto">
            {{-- header --}}
            <div
                class="bg-sidebar overflow-hidden shadow-sm mb-2 sm:rounded-lg flex flex-col md:flex-row justify-between items-center">
                <div class="p-4 text-white text-xl">
                    {{ __('Result of Evaluation Form') }}
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

            {{-- form --}}
            <div class="overflow-hidden shadow-sm rounded p-2">
                {{-- @include('dean.evaluation.create') --}}
                <span class="font-bold text-green uppercase tracking-wider">Overall result's of evaluation for our
                    teacher's</span>

                <canvas id="teacherEvaluationChart"></canvas>

            </div>

        </div>
    </div>

    @section('scripts')
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

        <script>
            $(document).ready(function() {
                console.log('connected')
                let status = @json(session('status'));
                let message = @json(session('message'));
                let categories = @json($filteredCategoriesArray);
                let result = @json($result);
                console.log(result)
                if (status !== null) {
                    Swal.fire({
                        title: "Saved Successfully",
                        text: message,
                        icon: status
                    });
                }
                // Example Dynamic Data
                // const teachersData = [{
                //         teacher: "Jean Dalisay",
                //         ratings: {
                //             "Knowledge and Preparation": 4,
                //             "Teaching Methods": 3,
                //             "Lectures": 2
                //         }
                //     },
                //     {
                //         teacher: "John Reyes",
                //         ratings: {
                //             "Knowledge and Preparation": 5,
                //             "Teaching Methods": 4,
                //             "Lectures": 3
                //         }
                //     },
                //     {
                //         teacher: "Maria Santos",
                //         ratings: {
                //             "Knowledge and Preparation": 3,
                //             "Teaching Methods": 2,
                //             "Lectures": 4
                //         }
                //     }
                // ];

                // Get all unique rating categories dynamically
                const ratingCategories = Array.from(
                    new Set(result.flatMap(teacher => Object.keys(teacher.ratings)))
                );

                // Create datasets dynamically for each teacher
                const datasets = result.map((teacher, index) => ({
                    label: teacher.teacher, // Teacher's name
                    data: ratingCategories.map(category => teacher.ratings[category] ||
                        0), // Map ratings, default to 0 if missing
                    backgroundColor: `rgba(${75 + index * 50}, ${192 - index * 30}, ${192 - index * 20}, 0.6)`, // Dynamic colors
                    borderColor: `rgba(${75 + index * 50}, ${192 - index * 30}, ${192 - index * 20}, 1)`,
                    borderWidth: 1
                }));

                // Chart.js setup
                const ctx = document.getElementById('teacherEvaluationChart').getContext('2d');
                const teacherEvaluationChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ratingCategories, // Dynamic categories as x-axis labels
                        datasets: datasets // Each teacher as a dataset
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            datalabels: {
                                anchor: 'end', // Position the label at the top of the bar
                                align: 'start',
                                color: 'black', // Label color
                                font: {
                                    weight: 'bold',
                                    size: 12
                                },
                                formatter: function(value) {
                                    return value; // Display the rating value
                                }
                            },
                            tooltip: {
                                enabled: true
                            },
                            legend: {
                                position: 'top' // Position legend at the top
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                min: 0, // Ensure that the Y-axis starts from 0
                                ticks: {
                                    stepSize: 1,
                                    callback: function(value) {
                                        return value; // Label each tick as the rating (1-5)
                                    }
                                }
                            }
                        },
                        indexAxis: 'x', // Set X-axis to display teachers horizontally
                        layout: {
                            padding: {
                                top: 50
                            }
                        },
                        stacked: false // Disable stacking, so each bar is shown separately
                    }
                });




            })
        </script>
    @endsection
</x-app-layout>
