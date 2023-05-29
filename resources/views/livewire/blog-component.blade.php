<div class="mt-6">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-4xl">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Blog Site</h2>

            <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">
                @forelse($articles as $article)
                    <livewire:summarized-article-component :article="$article"/>
                @empty
                    <p>No articles yet, comeback later!</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

