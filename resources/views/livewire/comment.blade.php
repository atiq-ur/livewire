<div class="flex justify-center">
    <div class="w-6/12">
        <h1 class="my-10 text-3xl">Comment</h1>
        @error('newComment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        <div>
            @if(session()->has('message'))
                <div class="p-3 bg-green-300 text-green-800 rounded shadow">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <section>
            {{--{{ $image }}--}}
            @if($image)
                <img src="{{ $image }}" alt="" width="200">
            @endif

            <input type="file" id="image" wire:change="$emit('fileChosen')">
        </section>
        <form class="my-4 flex" wire:submit.prevent="addComment">
            {{-- {{ $newComment }} --}}
            <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2"
                   {{--Lazy used for hitting AJAX req on focus outside--}}
            placeholder="What's in your mind." wire:model.debounce.500ms="newComment">
            <div class="py-2">
                <button class="p-2 bg-blue-500 w-20 rounded shadow text-white">
                    Add
                </button>
            </div>
        </form>
        @foreach ($comments as $comment)
            <div class="rounded border shadow p-3 my-2">
                <div class="flex justify-between my-2">
                    <div class="flex">
                        <p class="font-bold text-lg">{{ $comment->creator->name }}</p>
                        <p class="mx-3 py-2 text-xs text-gray-500 font-semibold">
                            {{--{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}--}}
                            {{ \Carbon\Carbon::parse($comment->created_at) }}
                        </p>
                    </div>
                    <button class="text-xs text-red-500" wire:click="remove({{ $comment->id }})">X</button>

                </div>
                <p class="text-gray-800">
                    {{ $comment->body }}
                </p>
                @if($comment->image)
                    <img src="{{ $comment->imagePath }}" alt=""/>
                @endif
        </div>
        @endforeach
        {{ $comments->links('pagination-links') }}
    </div>
</div>

<script>
    window.livewire.on('fileChosen', () => {
        let inputField = document.getElementById('image')
        let file = inputField.files[0]
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);

    })
</script>
