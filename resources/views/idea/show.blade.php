<x-layout>
    <div class="py-8">
        <div class="flex justify-between items-center">
            <a href="{{ route('idea.index') }}" class="flex items-center gap-x-2 text-sm font-medium">
{{--                <x-icons.arrow-back />--}}
                Back to Ideas
            </a>

            <div class="gap-x-3 flex items-center">
                <button
                    x-data
                    @click="$dispatch('open-modal', 'edit-idea')"
                    type="button"
                    class="btn btn-outlined"
                >
{{--                    <x-icons.external />--}}
                    Edit Idea
                </button>

                <form method="POST" action="{{ route('idea.destroy', $idea) }}">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outlined text-red-500">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-8 space-y-6">
        @if($idea->image)
            <div class="rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $idea->image) }}" alt="" class="w-full h-auto object-cover">
            </div>
        @endif

        <h1 class="font-bold text-4xl">{{ $idea->title }}</h1>

        <div class="mt-2 flex gap-x-3 items-center">
            <x-ideas.status-label :status="$idea->status->value">{{ $idea->status->label() }}</x-ideas.status-label>

            <div class="text-muted-foreground text-sm">{{ $idea->created_at->diffForHumans() }}</div>
        </div>

        <x-card class="mt-6">
            <div class="text-foreground max-w-none cursor-pointer">{{ $idea->description }}</div>
        </x-card>

        @if($idea->steps->count())
            <div>
                <h3 class="font-bold textlg mt-6">Actionable Steps</h3>

                <div class="mt-3 space-y-2">
                    @foreach($idea->steps as $step)
                        <x-card>
                            <form action="{{ route('step.update', $step) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <div class="flex items-center space-x-3">
                                    <button
                                        type="submit"
                                        role="checkbox"
                                        class="size-5 flex items-center justify-center border rounded-lg text-primary-foreground {{ $step->completed ? 'bg-primary' : 'border-primary' }} "
                                    >&check;</button>
                                    <span class="{{ $step->completed ? 'line-through text-muted-foreground' : '' }}">{{ $step->description }}</span>
                                </div>
                            </form>
                        </x-card>
                    @endforeach
                </div>
            </div>
        @endif

        @if($idea->links->count())
            <div>
                <h3 class="font-bold textlg mt-6">Links</h3>

                <div class="mt-3 space-y-2">
                    @foreach($idea->links as $link)
                        <x-card href="{{ $link }}" class="text-primary font-medium flex gap-x-3 items-center">{{ $link }}</x-card>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- modal -->
        <x-ideas.modal :idea="$idea" />
    </div>
</x-layout>
