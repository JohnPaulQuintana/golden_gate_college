<div class="text-center">
    <button id="enroll-modal-btn" type="button" class="hidden py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-enroll-modal" data-hs-overlay="#hs-enroll-modal">
      Open modal
    </button>
  </div>
  
  <div id="hs-enroll-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[9999] overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-enroll-modal-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto">
      <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
        <div class="absolute top-2 end-2">
          <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-enroll-modal">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
  
        <div class="p-4 sm:p-10 overflow-y-auto">
          <div class="mb-6 text-center">
            <h3 id="hs-enroll-modal-label" class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
              Enroll Student's to this Suject
            </h3>
            <p class="text-gray-500 dark:text-neutral-500">
              Once the student's is enrolled this subjects is visible to them.
            </p>
          </div>
          
          <div id="enrolled-student-card" class="space-y-4 grid grid-cols-1 md:grid-cols-2 gap-2 overflow-y-auto">
            
  
            <!-- Card -->
            <div class="relative bg-white shadow-lg rounded-lg p-6 flex flex-col items-start transition-all duration-300 hover:shadow-xl hover:scale-105 transform">
                <!-- Icon Section -->
                <svg class="w-12 h-12 mx-auto text-green mb-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                <!-- Subject Title and Details -->
                <div class="mb-6 flex-1">
                    <!-- Subject Title -->
                    <h3 class="subject_name text-base font-semibold text-green mb-2 px-3 uppercase">John Paul Quintana</h3>
            
                    <!-- Subject Code -->
                    <p class="text-sm text-gray-600 text-left px-3"><span class="subject_code font-medium">23232</span></p>
                    <p class="text-sm text-gray-600 text-left px-3">Student No.: <span class="subject_code font-medium">23232</span></p>
                    <p class="text-sm text-gray-600 text-left px-3">Semester: <span class="subject_code font-medium">3</span></p>
            
                    <!-- Year Level -->
                    <p class="text-sm text-gray-600 text-left px-3">
                        Level: First Year
                    </p>
                </div>
            
                <!-- Select and Credits Button Section -->
                <div class="absolute left-0 bottom-0 w-full flex items-center">
                    <!-- Select Button -->
                    <button class="enrolled-button flex-1 bg-slate-50 border text-green px-4 py-2 hover:bg-slate-100 transition-colors duration-300 focus:outline-none">
                        Select Student
                    </button>
                    
                </div>
            </div>
            
            <!-- End Card -->

          </div>
        </div>
  
        <div class="flex justify-between items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-neutral-950 dark:border-neutral-800">
            <div class="relative">
                <input id="search-student" type="text"
                    class="peer py-2 px-4 ps-11 block w-full bg-white shadow rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Enter student no.">
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
          <button type="button" class="cancelBtn hidden py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-enroll-modal">
            Cancel
          </button>
          <button class="save-selected-student py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border shadow bg-white text-green disabled:opacity-50 disabled:pointer-events-none" href="#">
            Enroll Student - <span id="student-count">0</span>
          </button>
        </div>
      </div>
    </div>
  </div>