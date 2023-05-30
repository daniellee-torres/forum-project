<article class="relative isolate flex flex-col gap-8 mx-6 py-6">
    <div>
        <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
            <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80" alt="" class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
            <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
        </div>
        <div>
            <div class="flex items-center gap-x-4 text-xs">
                <time datetime="2020-03-16" class="text-gray-500 mt-2">{{$article->created_at->diffForHumans()}}</time>
            </div>
            <div class="group relative max-w-xl">
                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                    <span class="absolute inset-0"></span>
                    {{$article->title}}
                </h3>
                <p class="mt-5 text-sm leading-6 text-gray-600">{{$article->body}}</p>
            </div>
            <div class="mt-6 flex border-b-2 border-gray-900/5 pt-6">
                <div class="relative flex items-center gap-x-4">
                    <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                    <div class="text-sm leading-6">
                        <p class="font-semibold text-gray-900">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                {{$article->user->name}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->check())
        <livewire:comment-form-component
            :user="auth()->user()"
            :articleId="$article->id"
            .wire:commentPosted="refreshComments"
        />
    @endif

    @forelse($article->comments->sortDesc() as $comment)
        <livewire:comment-component :comment="$comment" :user="$comment->user"/>
    @empty
        <p class="mt-1">Be the first to comment!</p>
    @endforelse

</article>




