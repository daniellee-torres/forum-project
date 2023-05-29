@forelse($comments as $comment)
    <div class="flex">
        <div>
            <div class="mr-4 flex-shrink-0 self-end">
                <svg class="w-7 border border-gray-300 bg-white text-gray-300" preserveAspectRatio="none" stroke="currentColor" fill="none" viewBox="0 0 200 200" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-width="1" d="M0 0l200 200M0 200L200 0" />
                </svg>
            </div>
            <div class="ml-4 text-sm">
                <h4 class="font-bold">{{$comment->user_id}}</h4>
                <p class="mt-1">{{$comment->body}}</p>
            </div>
        </div>
@empty
    <p class="mt-1">Be the first to comment!</p>
@endforelse
