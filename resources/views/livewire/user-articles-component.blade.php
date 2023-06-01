<div>
    {{--Filter--}}
    <div class="bg-white pl-3 pt-4 max-w-7xl mx-auto">
        <div class="border-b border-gray-200">
            <div class="flex justify-between">
                <h3 class="text-base font-semibold leading-6 text-gray-900">My Articles</h3>
                <div class="ml-auto sm:mt-0 flex ml-2">
                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                    <button wire:click="reload_component(true)" class="p-2 text-sm hover:border-b hover:border-gray-800 {{ $published ? 'font-semibold' : '' }}">Published</button>
                    <button wire:click="reload_component(false)" class="p-2 text-sm hover:border-b hover:border-gray-800 {{ !$published ? 'font-semibold' : '' }}">Unpublished</button>
                </div>
                <a href="/my-articles/create" class="ml-auto text-sm hover:bg-green-100 px-1 mr-2 bg-gray-50 rounded-lg">+ Add Article</a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto">
        @forelse ($this->articles as $article)
            <div x-data="{ editing: false }">
                <div x-show="!editing" class="bg-white py-5 sm:px-6 p-4">
                    <div class="mt-6 ">
                        <div class="flex space-x-3">
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-semibold text-gray-900">
                                    <a href="#" class="hover:underline">{{$article->title}}</a>
                                </p>
                                <p class="text-sm text-gray-500">
                                    <a href="#" class="hover:underline">{{$article->publication_date}}</a>
                                </p>
                            </div>
                            <div class="flex flex-shrink-0 self-center">
                                <div class="relative inline-block text-left">

                                    {{--Actions--}}

                                    <div x-data="{ open: false }">
                                        <label id="listbox-label" class="sr-only">Change published status</label>
                                        <div class="relative">
                                            <div class="inline-flex divide-x divide-indigo-700 rounded-md shadow-sm">
                                                <div class="inline-flex items-center gap-x-1.5 rounded-l-md bg-indigo-600 px-3 py-2 text-white shadow-sm">
                                                    <p class="text-sm font-semibold">{{ $published ? 'Published' : 'Unpublished' }}</p>
                                                </div>
                                                <button type="button" @click="open = !open" class="inline-flex items-center rounded-l-none rounded-r-md bg-indigo-600 p-2 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-gray-50" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                                    <span class="sr-only">Change published status</span>
                                                    <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <ul x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-72 origin-top-right divide-y divide-gray-200 overflow-hidden rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-0">
                                                <li class="text-gray-900 cursor-default select-none p-4 text-sm hover:bg-gray-200" id="listbox-option-0" role="option">
                                                    <button @click="editing = true">
                                                        <div class="flex flex-col">
                                                            <div class="flex justify-between">
                                                                <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                                                <p class="font-normal">Edit</p>
                                                            </div>
                                                            <p class="text-gray-500 mt-2">Modify article details and change publication date</p>
                                                        </div>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit mode -->
                <div x-show="editing">
                    <div class="relative">
                        <button @click="editing = false" class="absolute inset-y-0 right-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <livewire:edit-article-component :article="$article"/>
                </div>
            </div>
        @empty
            <p class="flex justify-center p-6">No articles here yet, go and make some.</p>
        @endforelse
    </div>
</div>
