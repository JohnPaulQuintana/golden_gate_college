<!-- Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-3">
    
    @foreach ($programs as $item)
    
        <div class="p-4 bg-white border border-gray-200 rounded-lg dark:border-neutral-700">
            <div class="flex gap-2 items-center mb-2 border-b-2">
                <svg class="shrink-0 size-6 text-green" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M184 48l144 0c4.4 0 8 3.6 8 8l0 40L176 96l0-40c0-4.4 3.6-8 8-8zm-56 8l0 40L64 96C28.7 96 0 124.7 0 160l0 96 192 0 128 0 192 0 0-96c0-35.3-28.7-64-64-64l-64 0 0-40c0-30.9-25.1-56-56-56L184 0c-30.9 0-56 25.1-56 56zM512 288l-192 0 0 32c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32l0-32L0 288 0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-128z"/></svg>
                <p class="mt-1 text-base text-gray-600 dark:text-neutral-400">
                    Golden Gate College
                </p>
            </div>
            <div class="mb-2">
                <h3 class="mb-1 text-sm font-bold text-gray-600 dark:text-neutral-400">
                    Academic Year : {{ $item->semester->academic_year->academic_year ?? 'N/A' }} / <span class="text-red-500 px-1">{{ $item->is_open }}</span>
                </h3>
            
                <p class="font-semibold text-sm text-gray-800 dark:text-neutral-200">
                    {{ $item->program }}
                </p>
            </div>
            <div>
                <a href="{{ route('registrar.enroll', $item->id) }}" class="bg-red-500 p-1 text-white rounded-md transition duration-300 ease-in-out hover:scale-105 hover:bg-red-700">Enroll Student</a>
            </div>
        </div>
    @endforeach
    
  
    
  </div>
  <!-- End Grid -->