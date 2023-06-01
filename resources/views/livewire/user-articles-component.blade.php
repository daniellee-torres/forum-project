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
        <div class="bg-white py-5 sm:px-6 p-4">
{{--            <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:shrink-0">--}}
{{--                <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80" alt="" class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">--}}
{{--                <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>--}}
{{--            </div>--}}

            <div class="mt-6 ">
                <div class="flex space-x-3">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-gray-900">
                            <a href="#" class="hover:underline">{{$article->title}}</a>
                        </p>
                        <p class="text-sm text-gray-500">
                            <a href="#" class="hover:underline">December 9 at 11:43 AM</a>
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
                                            <svg class="-ml-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                            </svg>
                                            <p class="text-sm font-semibold">Published</p>
                                        </div>
                                        <button type="button" @click="open = !open" class="inline-flex items-center rounded-l-none rounded-r-md bg-indigo-600 p-2 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-gray-50" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                            <span class="sr-only">Change published status</span>
                                            <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!--
                                      Select popover, show/hide based on select state.

                                      Entering: ""
                                        From: ""
                                        To: ""
                                      Leaving: "transition ease-in duration-100"
                                        From: "opacity-100"
                                        To: "opacity-0"
                                    -->
                                    <ul x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-72 origin-top-right divide-y divide-gray-200 overflow-hidden rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-0">
                                        <!--
                                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                                          Highlighted: "bg-indigo-600 text-white", Not Highlighted: "text-gray-900"
                                        -->
                                        <li class="text-gray-900 cursor-default select-none p-4 text-sm" id="listbox-option-0" role="option">
                                            <div class="flex flex-col">
                                                <div class="flex justify-between">
                                                    <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                                    <p class="font-normal">Published</p>
                                                    <!--
                                                      Checkmark, only display for selected option.

                                                      Highlighted: "text-white", Not Highlighted: "text-indigo-600"
                                                    -->
                                                    <span class="text-indigo-600">
                                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <!-- Highlighted: "text-indigo-200", Not Highlighted: "text-gray-500" -->
                                                <p class="text-gray-500 mt-2">This article is available publicly in the Blog Site.</p>
                                            </div>
                                        </li>

                                        <li class="text-gray-900 cursor-default select-none p-4 text-sm" id="listbox-option-0" role="option">
                                            <div class="flex flex-col">
                                                <div class="flex justify-between">
                                                    <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                                    <p class="font-normal">Edit</p>
                                                    <!--
                                                      Checkmark, only display for selected option.

                                                      Highlighted: "text-white", Not Highlighted: "text-indigo-600"
                                                    -->
                                                    <span class="text-indigo-600">
                                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <!-- Highlighted: "text-indigo-200", Not Highlighted: "text-gray-500" -->
                                                <p class="text-gray-500 mt-2">Modify article details and change publication date</p>
                                            </div>
                                        </li>

                                        <!-- More items... -->
                                    </ul>
                                </div>
                            </div>


                            {{--End of actions Dropdown--}}

                        </div>
                    </div>
                </div>
                <p class="p-6">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo impedit sapiente recusandae iusto officiis dolor? Laborum quibusdam quam, quidem vel assumenda repellat inventore sint nesciunt, ullam asperiores magnam placeat eveniet. Aliquam voluptatibus assumenda distinctio veniam quam tempora modi aperiam nemo voluptate reprehenderit quidem, nisi vero est.
                </p>
            </div>
        </div>
    @empty
        <p class="flex justify-center p-6">No articles here yet, go and make some.</p>
    @endforelse
</div>
</div>
