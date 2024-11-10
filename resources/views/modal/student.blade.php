<div class="text-center">
    <button id="student_modal_btn" type="button" class="hidden py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-modal-student" data-hs-overlay="#hs-modal-student">
      Open modal
    </button>
  </div>
  
  <div id="hs-modal-student" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-modal-liabilities-create-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
      <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-800">
        <div class="p-4 sm:p-7">
          <div class="flex gap-2">
            <img id="modal-profile" class="w-[150px] h-[150px] shadow rounded-md" src="https://img.freepik.com/free-vector/young-man-with-glasses-illustration_1308-174706.jpg" alt="no-profile" sizes="" srcset="">
            <div class="flex flex-col">
              <h3 id="hs-modal-liabilities-create-label" class="modal-name text-xl font-bold text-gray-800 dark:text-neutral-200">
                John Paul Quintana
                {{-- <span class="text-xs text-slate-600 modal-program">Bachelor Degree of Information Technoloy</span> --}}
              </h3>
              <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                Student No. : <span class="modal-st"></span>
              </p>
              <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                Year Level. : <span class="modal-yl"></span>
              </p>
              <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                Submitted. : <span class="modal-created_at"></span>
              </p>
            </div>
          </div>
  
          <div class="mt-5 mb-2">
            
  
            <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-800 dark:after:border-neutral-800">
                Basic Information
            </div>
  
            <!-- student card -->
              <div class="student-card grid grid-cols-1 gap-1">
                  
              </div>

            <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-800 dark:after:border-neutral-800">
                Selected Subject's - <span id="totalCredits" class="text-red-500"></span>
            </div>
  
            <!-- student card -->
              <div class="subject-card grid grid-cols-1 gap-2">
                  
              </div>
            <!-- liabilities card end -->
          </div>
          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-modal-student">
            Cancel
          </button>
          <a href="#" class="proceed py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 hover:cursor-pointer">
                Proceed To Cashier
          </a>
          <button type="button" class="notify-student py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-modal-student">
                Notify Student
          </button>
        </div>
        
      </div>
    </div>
  </div>