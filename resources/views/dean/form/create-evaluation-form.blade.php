<form action="{{ route('dean.subjects.store') }}" method="post">
    @csrf
    <div class="flex flex-col max-w-full">
        <span class="font-bold text-green uppercase tracking-wider">Subjects Section</span>
        <div class="mb-2">
            <div class="flex max-w-full gap-2 mb-2">
                {{-- Subject Code --}}
                <div class="flex-1 space-y-3"> 
                    <div class="relative">
                        <input name="subject_code" placeholder="Enter Subject Code" class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600"/>
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                            <svg class="shrink-0 size-4 text-green dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512" fill="currentColor" stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                        </div>
                    </div>
                    @error('subject_code')
                        <div class="flex gap-2 items-center"> 
                            <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                {{-- Subject Name --}}
                <div class="flex-1 space-y-3"> 
                    <div class="relative">
                        <input name="subject_name" placeholder="Enter Subject name" class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600"/>
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                            <svg class="shrink-0 size-4 text-green dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512" fill="currentColor" stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                        </div>
                    </div>
                    @error('subject_name')
                        <div class="flex gap-2 items-center"> 
                            <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                {{-- Credits --}}
                <div class="flex-1 space-y-3"> 
                    <div class="relative">
                        <input type="number" name="credits" placeholder="Enter Credits" class="peer py-3 pe-0 ps-8 block w-full bg-white rounded-md border-t-transparent border-b-2 border-x-transparent border-b-gray-200 text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-[#32620e] focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600"/>
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                            <svg class="shrink-0 size-4 text-green dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512" fill="currentColor" stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                        </div>
                    </div>
                    @error('credits')
                        <div class="flex gap-2 items-center"> 
                            <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" stroke="currentColor"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                
            </div>
           
        </div>
    </div>
    
    <button type="button" class="bg-red-500 p-2 text-white rounded-md hover:bg-red-500">
        <a href="{{ route('dean.dashboard') }}" class="bg-red-500 p-2 text-white rounded-md">Back to dashboard</a>
    </button>
    <button type="submit" class="bg-sidebar p-2 text-white rounded-md hover:bg-green">Add Subjects</button>
</form>