<div class="text-center">
    <button id="liabilities_found_btn" type="button" class="hidden py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-modal-liabilities-list-found" data-hs-overlay="#hs-modal-liabilities-list-found">
      Open modal
    </button>
  </div>
  
  <div id="hs-modal-liabilities-list-found" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-modal-liabilities-create-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
      <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-800">
        <div class="p-4 sm:p-7">
          <div class="text-center">
            <h3 id="hs-modal-liabilities-create-label" class="flex flex-col text-2xl font-bold text-gray-800 dark:text-neutral-200">
                Liabilities Tag on you.
            </h3>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
              All the liabilities that not settled.
            </p>
          </div>
  
          <div class="mt-5 mb-2 max-h-[350px] overflow-y-auto">
            
  
            <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-800 dark:after:border-neutral-800">
                Liabilities unpaid
            </div>
  
            <!-- liabilities card -->
              <div class="grid grid-cols-1 gap-2" id="render-list">
                  <div class="bg-slate-50 p-2 rounded-sm shadow flex flex-col gap-2">
                      <p class="text-green">Please pay your IINTESS Membership Fee for First Semester AY 2024-2025 amounting Php 70.00 at the CICS-SC Office located at CICS Bldg, Ground floor near RM 101, Thank!</p>
                      <span class="text-xs">First / 2024-2025</span> 
                      <span class="text-xs">posted by: cics_sc - 2024-09-12 12:12:51</span> 
                  </div>
              </div>
            <!-- liabilities card end -->
          </div>
          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-modal-liabilities-list-found">
            Cancel
          </button>
        </div>
        
      </div>
    </div>
  </div>