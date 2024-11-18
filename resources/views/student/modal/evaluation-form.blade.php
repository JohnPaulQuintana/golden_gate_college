<div class="text-center">
    <button id="evaluation_form_btn" type="button" class="hidden py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-modal-evaluation-form" data-hs-overlay="#hs-modal-evaluation-form">
      Open modal
    </button>
  </div>
  
  <div id="hs-modal-evaluation-form" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-modal-liabilities-create-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto">
      <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-800">
        <div class="p-4 sm:p-7">
          <div class="text-center">
            <h3 id="hs-modal-liabilities-create-label" class="teacher_name flex flex-col text-2xl font-bold text-gray-800 dark:text-neutral-200">
                Teacher Name Here.
            </h3>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400 teacher_email">
            </p>
          </div>
  
          <form action="{{ route('student.form.save') }}" method="POST" class="mt-5 mb-2 ">
            @csrf
            <input type="number" class="teacher_id hidden" name="teacher_id" value="">
            <input type="number" class="subject_id hidden" name="subject_id" value="">
            <div class="max-h-[400px] overflow-y-auto category-container">

            </div>
  
            {{-- <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-800 dark:after:border-neutral-800">
                Category
            </div> --}}
  
            
            <button type="button" class="py-2 mt-10 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-modal-evaluation-form">
              Cancel
            </button>
            
            <button type="submit" class="py-2 mt-10 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-modal-evaluation-form">
              Submit
            </button>
          </form>
        </div>
        
      </div>
    </div>
  </div>