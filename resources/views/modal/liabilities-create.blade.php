<div class="text-center">
    <button id="liabilities_create_btn" type="button" class="hidden py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-modal-liabilities-create" data-hs-overlay="#hs-modal-liabilities-create">
      Open modal
    </button>
  </div>
  
  <div id="hs-modal-liabilities-create" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-modal-liabilities-create-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
      <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-800">
        <div class="p-4 sm:p-7">
          <div class="text-center">
            <h3 id="hs-modal-liabilities-create-label" class="block text-2xl font-bold text-gray-800 dark:text-neutral-200">Create a liabilities</h3>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
              Once its created its available to all student's
            </p>
          </div>
  
          <div class="mt-5">
            
  
            <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-800 dark:after:border-neutral-800">
                Liability
            </div>
  
            <!-- Form -->
            <form method="POST" action="{{ route('cashier.liabilities.create') }}">
                @csrf
                <input type="number" name="user_id" value="{{ Auth::user()->id }}" class="hidden">
              <div class="grid gap-y-4">
                <!-- Form Group -->
                <div>
                  <label for="email" class="block text-sm mb-2 dark:text-white">Liabilities description</label>
                  <div class="max-w-full space-y-3">
                    <textarea name="liabilities_description" class="py-3 px-4 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="10" placeholder="This is a liabilities details"></textarea>
                  </div>
                </div>
                <!-- End Form Group -->
  
                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Sign in</button>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
      </div>
    </div>
  </div>