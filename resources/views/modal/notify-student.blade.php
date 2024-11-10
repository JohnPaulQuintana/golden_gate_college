<div class="text-center">
    <button id="notify_modal_btn" type="button" class="hidden py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-modal-notify" data-hs-overlay="#hs-modal-notify">
      Open modal
    </button>
  </div>
  
  <div id="hs-modal-notify" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-modal-liabilities-create-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
      <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-800">
        <form action="{{ route('registrar.notify') }}" method="post">
          @csrf
            <div class="p-4 sm:p-7">
              <div class="text-center">
                <h3 id="hs-modal-liabilities-create-label" class="flex flex-col text-2xl font-bold text-red-500 dark:text-neutral-200">
                    Call to Action
                  <span class="text-xs text-slate-600">Tell them the next step what is the problem on there application...</span>
                </h3>
              </div>
      
              <div class="mt-5 mb-2">
                
      
                <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-800 dark:after:border-neutral-800">
                    Tell theme what to do?
                </div>
      
                <!-- student card -->
                  <div class="cta-student-card grid grid-cols-1 gap-1">
                    <input type="number" name="student_id" id="cts-student-id" value="" class="hidden">
                    <textarea name="notify_message" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder=""></textarea>
                  </div>
    
              </div>
              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-modal-notify">
                Cancel
              </button>
              <button type="submit" class="notify-student py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-modal-notify">
                    Notify Student
              </button>
          </div>
        </form>
        
      </div>
    </div>
  </div>