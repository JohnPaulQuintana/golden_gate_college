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
                    {{ __('Student Analytics for Student Subjects') }}
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
                <div class="flex items-center justify-between">
                    <span class="flex-1 font-bold text-green uppercase tracking-wider">Analytics Result</span>
                    <div class="relative w-[300px]">
                        <select id="semesterFilter" name="nationality"
                            class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                            <option value="All">All Semesters</option>
                            <option value="First Semester">First Semester</option>
                            <option value="Second Semester">Second Semester</option>
                            <option value="Summer">Summer</option>
                            <!-- Add more nationalities as needed -->
                        </select>
                        <div
                            class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                            <svg class="shrink-0 size-4 text-green dark:text-neutral-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512"
                                fill="currentColor" stroke="currentColor">
                                <path
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <canvas id="analyticChart"></canvas>

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
                let subjectDatas = @json($subjectDatas);
                console.log(subjectDatas)
                if (status !== null) {
                    Swal.fire({
                        title: "Saved Successfully",
                        text: message,
                        icon: status
                    });
                }
                // const subjectDatas = [{
                //         subject: "Subject 1",
                //         grade: {
                //             "First Semester": 4,
                //             "Second Semester": 3.5,
                //             "Summer": 4.2
                //         }
                //     },
                //     {
                //         subject: "Subject 2",
                //         grade: {
                //             "First Semester": 1,
                //             "Second Semester": 2.5,
                //             "Summer": 3.0
                //         }
                //     },
                //     {
                //         subject: "Subject 3",
                //         grade: {
                //             "First Semester": 2.75,
                //             "Second Semester": 3.0,
                //             "Summer": 2.5
                //         }
                //     },
                //     {
                //         subject: "Subject 4",
                //         grade: {
                //             "First Semester": 2.35,
                //             "Second Semester": 3.5,
                //             "Summer": 3.75
                //         }
                //     },
                //     {
                //         subject: "Subject 5",
                //         grade: {
                //             "First Semester": 4.75,
                //             "Second Semester": 4.5,
                //             "Summer": 4.8
                //         }
                //     }
                // ];


                // Get all unique semester categories dynamically
                const semesterCategories = Array.from(
                    new Set(subjectDatas.flatMap(subject => Object.keys(subject.grade)))
                );

                // Create datasets dynamically for each subject and all semesters
                const datasets = subjectDatas.map((subject, index) => ({
                    label: subject.subject, // Subject name
                    data: semesterCategories.map(semester => subject.grade[semester] ||
                        0), // Map grades for each semester
                    backgroundColor: `rgba(${75 + index * 50}, ${192 - index * 30}, ${192 - index * 20}, 0.6)`, // Dynamic colors
                    borderColor: `rgba(${75 + index * 50}, ${192 - index * 30}, ${192 - index * 20}, 1)`,
                    borderWidth: 1
                }));
                // Chart.js setup
                const ctx = document.getElementById('analyticChart').getContext('2d');
                const analyticChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: semesterCategories, // All semesters as x-axis labels
                        datasets: datasets // All subjects as datasets
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            datalabels: {
                                anchor: 'end',
                                align: 'start',
                                color: 'black',
                                font: {
                                    weight: 'bold',
                                    size: 12
                                },
                                formatter: function(value) {
                                    return value.toFixed(2); // Display the rating value
                                }
                            },
                            tooltip: {
                                enabled: true
                            },
                            legend: {
                                position: 'top'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                min: 0,
                                ticks: {
                                    stepSize: 1,
                                    callback: function(value) {
                                        return value;
                                    }
                                }
                            }
                        },
                        indexAxis: 'x',
                        layout: {
                            padding: {
                                top: 50
                            }
                        },
                        stacked: false
                    }
                });

                // jQuery: Event listener for the semester filter change
                $('#semesterFilter').on('change', function() {
                    const selectedSemester = $(this).val();
                    updateChart(selectedSemester); // Update the chart with selected semester data
                });

                // jQuery function to update the chart based on the selected semester
                function updateChart(selectedSemester) {
                    const filteredDatasets = subjectDatas.map((subject, index) => {
                        const data = selectedSemester === "All" ?
                            semesterCategories.map(semester => subject.grade[semester] || 0) : [subject.grade[
                                selectedSemester] || 0];

                        return {
                            label: subject.subject,
                            data: data,
                            backgroundColor: `rgba(${75 + index * 50}, ${192 - index * 30}, ${192 - index * 20}, 0.6)`,
                            borderColor: `rgba(${75 + index * 50}, ${192 - index * 30}, ${192 - index * 20}, 1)`,
                            borderWidth: 1
                        };
                    });

                    // Update the chart labels and datasets based on the selected semester
                    analyticChart.data.datasets = filteredDatasets;
                    analyticChart.data.labels = selectedSemester === "All" ? semesterCategories : [
                        selectedSemester
                    ];
                    analyticChart.update();
                }

            })
        </script>
    @endsection
</x-app-layout>
