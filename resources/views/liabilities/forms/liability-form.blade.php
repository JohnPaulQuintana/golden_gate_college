<form action="{{ route('liabilities.create')  }}" method="post">
  @csrf
  <div class="flex flex-col max-w-full">
      <span class="font-bold text-green uppercase tracking-wider">Liability Form</span>
      <div class="mb-1">
          <div class="grid grid-cols-3 max-w-full gap-2 mb-2">
              {{-- Academic Year --}}
              <div class="flex-1 space-y-3"> 
                  <div class="relative">
                    <select name="academic_year" class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                        <option value="">Select academic year</option>
                        @foreach ($academic_years as $year)
                          <option class="uppercase text-green" value="{{ $year->id }}">{{ $year->academic_year }}</option>
                        @endforeach
                        <!-- Add more options as needed -->
                    </select>
                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                        <svg class="shrink-0 size-4 text-green dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512" fill="currentColor" stroke="currentColor">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc-->
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/>
                        </svg>
                    </div>
                </div>
              
            
              </div>
              {{-- semester --}}
              <div class="flex-1 space-y-3"> 
                  <div class="relative">
                      <select name="semester" class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
                        <option value="">Select semester</option>
                        @foreach ($semesters as $semester)
                          <option class="uppercase text-green" value="{{ $semester->id }}">{{ $semester->name }} Semester</option>
                        @endforeach
                      </select>
                      <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                          <svg class="shrink-0 size-4 text-green dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512" fill="currentColor" stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                      </div>
                  </div>
                  
              </div>
              {{-- amount --}}
              <div class="flex-1 space-y-3"> 
                  <div class="relative">
                      <input name="amount" placeholder="Provide an amount." type="number" min="1" class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" />
                        
                      <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                          <svg class="shrink-0 size-4 text-green dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512" fill="currentColor" stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                      </div>
                  </div>
                  
              </div>
              {{-- Description --}}
              <div class="col-span-3 space-y-3"> 
                  <div class="relative">
                    <textarea name="liabilities_description" class="py-2 block w-full bg-white border-transparent rounded-lg text-sm focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder="This is a liabilities details"></textarea>
                      
                  </div>
                  
              </div>
              
          </div>
          
      </div>
      
  </div>
  
  <button type="button" class="bg-red-500 p-2 text-white rounded-md hover:bg-red-500">
      <a href="{{ route('cashier.dashboard') }}" class="bg-red-500 p-2 text-white rounded-md">Back to dashboard</a>
  </button>
  <button type="submit" class="bg-sidebar p-2 text-white rounded-md hover:bg-green">Add Liabilities</button>
</form>