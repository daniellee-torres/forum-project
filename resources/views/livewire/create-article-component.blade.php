<div class="space-y-10 divide-y divide-gray-900/10">
     <div class="gap-y-8">
          <div class="px-4 sm:px-0">
               <h2 class="text-base font-semibold leading-7 text-gray-900 p-4 pl-3 flex justify-center bg-gray-100">Article</h2>
          </div>

          <form wire:submit.prevent="save_article" method="POST" action="{{route('saveArticle')}}" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" enctype="multipart/form-data">
               @csrf
               <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mx-auto">
                         <div class="col-span-full">
                              <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                              <div class="mt-2">
                                   <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm"></span>
                                        <input wire:model="title" type="text" name="title" id="title" required class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        @error('title')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                   </div>
                              </div>
                         </div>

                         <div class="col-span-full">
                              <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
                              <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                   <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                             <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                             <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                  <span>Upload a file</span>
                                                  <input wire:model="image" id="image" name="image" type="file" class="sr-only">
                                             </label>
                                             <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                   </div>
                              </div>
                         </div>

                         <div class="col-span-full">
                              <label for="summary" class="block text-sm font-medium leading-6 text-gray-900">Summary</label>
                              <div class="mt-2">
                                   <textarea wire:model="summary" id="summary" name="summary" rows="2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                              </div>
                         </div>

                         <div class="col-span-full">
                              <label for="body" class="block text-sm font-medium leading-6 text-gray-900" required>Body</label>
                              <div class="mt-2">
                                   <textarea wire:model="body" id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                   @error('body')
                                   <span class="text-red-500 text-sm">{{ $message }}</span>
                                   @enderror
                              </div>
                         </div>

                         <div class="col-span-full">
                              <label for="publication_date" class="block text-sm font-medium text-gray-700">Publication Date</label>
                              <input wire:model="publication_date" required type="date" id="publication_date" name="publication_date" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              @error('publication_date')
                              <span class="text-red-500 text-sm">{{ $message }}</span>
                              @enderror
                         </div>
                    </div>
               </div>
               <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <button wire:click.debounce="cancel" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
               </div>
          </form>
     </div>
</div>
