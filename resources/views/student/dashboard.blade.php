<x-app-layout>

    <div class="w-full">
        <div class="mx-auto">
            {{-- header --}}
            <div class="bg-sidebar overflow-hidden shadow-sm mb-2 sm:rounded-lg flex flex-col md:flex-row justify-between items-center">
                <div class="p-4 text-[#bc9c22] text-xl uppercase">
                    <span>{{ __("Your gateway to success, welcome back, goldenian!") }}</span>
                </div>

                <div class="hs-dropdown relative inline-flex">
                    <button id="hs-dropdown-custom-trigger" type="button" class="hs-dropdown-toggle py-1 ps-1 pe-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-full focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                      {{-- <img class="w-8 h-auto rounded-full" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Avatar"> --}}
                      <span class="w-10 h-10 border text-xl border-[#bc9c22] bg-[#bc9c22] rounded-full flex justify-center items-center font-bold text-green">{{ $initial }}</span>
                      <span class="text-white font-medium truncate max-w-[7.5rem] dark:text-neutral-400">{{ auth()->user()->name }}</span>
                      <svg class="hs-dropdown-open:rotate-180 size-4 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                  
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-sidebar shadow-md rounded-lg p-1 space-y-0.5 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-custom-trigger">
                      <a class="flex items-center gap-x-1.5 py-2 px-3 rounded-lg text-sm text-white hover:bg-hover focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                        <svg class="text-[#bc9c22]" xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor" stroke="currentColor" viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L64 0zm96 320l64 0c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16L96 416c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM144 64l96 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-96 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                        Manage Profile
                      </a>
                      <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf

                        <button class="w-full flex items-center gap-x-1.5 py-2 px-3 rounded-lg text-sm text-white hover:bg-hover focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" type="submit">
                            <svg class="text-[#bc9c22]" xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor" stroke="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
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
                            <img class="w-[100px] h-[100px] rounded-full" src="{{ asset('img/profile-default.jpg') }}" alt="" srcset="">
                        </div>
                        <div class="details flex flex-col uppercase">
                            <span class="font-bold">{{ $information->information->firstname }}, {{ $information->information->lastname }}, {{ $information->information->middlename }}</span>
                            <span class="text-sm">3rd Year, BSIT</span>
                            <span class="text-sm">Business Analytics</span>
                            <span class="text-sm">Second Semester AY 2023-2024</span>
                            <span class="text-sm text-[#bc9c22]">Enrolled</span>
                        </div>
                    </div>   
                    <div class="">
                        <div>
                            <svg class="shrink-0 size-28 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                        </div>
                    </div>   
                </div>
            </div>

            {{-- dahboard content --}}
            <div class="bg-white overflow-hidden shadow-sm rounded p-2">
                <span class="font-bold ps-2 text-xl text-green">Finance</span>
                <div class="flex flex-wrap justify-between gap-2 items-center">
                    <div class="flex-1 flex gap-2 items-center">
                        <div class="flex-1">
                            <div class="flex-1 p-2">
                                <div class="border rounded-md border-green-700 p-2 flex flex-col justify-center items-center gap-2">
                                    <svg class="shrink-0 size-14 text-green" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg>
                                    <div class="text-center">
                                        <span class="block font-bold text-2xl text-green">₱10000</span>
                                        <span class="text-slate-700">Total Payable Amount</span>
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="flex-1">
                            <div class="flex-1 p-2">
                                <div class="border rounded-md border-green-700 p-2 flex flex-col justify-center items-center gap-2">
                                    <svg class="shrink-0 size-14 text-green" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 64C28.7 64 0 92.7 0 128L0 384c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64L64 64zm64 320l-64 0 0-64c35.3 0 64 28.7 64 64zM64 192l0-64 64 0c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64l0 64-64 0zm64-192c-35.3 0-64-28.7-64-64l64 0 0 64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                                    <div class="text-center">
                                        <span class="block font-bold text-2xl text-green">₱10000</span>
                                        <span class="text-slate-700">Total Paid Amount</span>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>

                    <div class="flex-1">
                        <div class="">
                            <div class="rounded-md border-green-700 flex flex-col gap-1">
                                <div class="border p-2 bg-slate-100 rounded-md">
                                    <span class="font-bold text-[#bc9c22]">Mission</span>
                                    <p class="text-green">Golden Gate Colleges, as a private non-sectarian institution</p>
                                </div>
                                
                                <div class="border p-2 bg-slate-100 rounded-md">
                                    <span class="font-bold text-[#bc9c22]">Vision</span>
                                    <p class="text-green">A center of educational excellence, whose graduates are global</p>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>

                <span class="font-bold ps-2 text-xl text-green">Subjects</span>
            </div>


        </div>
    </div>
</x-app-layout>