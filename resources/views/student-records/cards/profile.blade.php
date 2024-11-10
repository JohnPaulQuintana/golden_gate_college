
<!-- Card -->
<div class="student-list-card group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
    <div class="h-32 flex flex-col justify-center items-center bg-slate-200 rounded-t-xl overflow-hidden">
        {{-- <svg class="size-12 text-green" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg> --}}
        <img class="w-full h-[200px]" src="{{ asset($student->profile) }}" alt="" srcset="">
      </div>
    <div class="student-list p-2 md:p-4">
        <h3 class="text-base font-semibold capitalize text-green dark:text-neutral-300 dark:hover:text-white">
            {{ $student->fullname }}
        </h3>
        @php
            $yearLevels = [
                1 => '1st Year',
                2 => '2nd Year',
                3 => '3rd Year',
                4 => '4th Year',
            ];
        @endphp

        <span data-id="{{ $student->student_no }}" class="student-item block mb-1 text-xs font-semibold uppercase text-slate-600 dark:text-blue-500">
            {{ $yearLevels[$student->year_level] ?? 'N/A' }} - #{{ $student->student_no }} 
        </span>
        <span class="block mb-1 text-xs font-semibold uppercase text-slate-600 dark:text-blue-500">
          {{ $student->academic_year }} | {{ $student->semester }} Semester 
        </span>
      <p data-degree="{{ $student->program }}" class="student-item mt-2 text-sm text-green dark:text-neutral-500">
            {{ $student->program }}
      </p>
    </div>
    <div class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
      <a data-user_id="{{ $student->user_id }}" data-name="{{ $student->fullname }}" data-program="{{ $student->program }}" class="liability-list-btn w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-es-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
        Liabilities <span class="text-red-500">{{ $liabilities }}</span>
      </a>

      @if (Auth::user()->role === 'cashier' && $student->status !== 'enrolled')
          <a href="{{ route('cashier.enroll', $student->user_id) }}" class="enrollbutton w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-xs font-medium rounded-ee-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
              Enroll
          </a>
      @elseif ($student->status === 'enrolled')
          <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-xs font-medium rounded-ee-xl bg-white text-green shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
            Enrolled
        </a>
      @else
          <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-xs font-medium rounded-ee-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
              Not-Enrolled
          </a>
      @endif
    </div>
  </div>
  <!-- End Card -->

