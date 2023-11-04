<div class="flex flex-col gap-10">
    <h1 class="text-2xl text-downriver font-semibold">Liked projects</h1>
    <section class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($projects as $project)
            <article class="group w-full h-96 rounded-lg shadow-lg bg-cover" style="background-image: url('{{ $project->getFirstMediaUrl('images') }}')">
                <section class="w-full h-full flex flex-col gap-4 justify-end p-8 bg-gradient-to-t from-white">
                    <p class="invisible group-hover:visible transition-all duration-400 translate-y-14 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 text-downriver text-xs text-ellipsis [text-shadow:_0_1px_0_rgb(255_255_255_/_40%)]">
                        {{ $project->description }}
                    </p>
                    <p class="rounded-md bg-clip-text text-downriver font-bold [text-shadow:_0_1px_0_rgb(255_255_255_/_40%)]">{{ $project->title }} by <span class="text-bittersweet">{{ $project->user->name }}</span></p>
                    <div class="flex justify-end gap-3">
                        <button @click="$dispatch('toogleLike', {id: {{ $project->id }} })"><x-icon class="cursor-pointer w-6 h-6 {{ $project->isLiked ? 'fill-bittersweet animate-heartbeat' : 'fill-manatee' }}" name="heart" solid /></button>
                    </div>
                </section>
            </article>
        @empty
            <span class="text-manatee text-sm self-center">You don't have any favorite projects</span>
        @endforelse
    </section>
    <section class="text-sm text-manatee">
        {{ $projects->links() }}
    </section>
    <livewire:popup text='Are you sure you want delete the item?' />
    <style>
        @keyframes heartbeat {
            0% {
            transform: scale(1);
            }
            25% {
            transform: scale(1.5);
            }
            50% {
            transform: scale(1);
            }
            75% {
            transform: scale(1.5);
            }
            100% {
            transform: scale(1);
            }
        }

        .animate-heartbeat {
            animation: heartbeat 0.5s ease-in-out;
        }
    </style>

</div>

