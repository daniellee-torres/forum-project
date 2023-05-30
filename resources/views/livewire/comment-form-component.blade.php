<form wire:submit.prevent="postComment" action="#" method="POST">
    @csrf
    <div class="w-3/4">
        <label for="comment" class="block text-sm font-medium leading-6 text-gray-900 ml-1">Add your comment:</label>
        <div class="mt-2">
            <textarea wire:model.defer="comment" rows="3" name="comment" id="comment" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            @error('comment')
            <p class="text-red-700 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button class="bg-gray-300 px-3 rounded-md mt-2 hover:bg-gray-500">Post</button>
    </div>
</form>
