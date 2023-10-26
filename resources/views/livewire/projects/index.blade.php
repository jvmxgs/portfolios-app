<div class="flex flex-col gap-10">
    <h1 class="text-2xl text-dark-blue font-semibold">Projects</h1>
    <section class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse ($projects as $project)
            <article class="group w-full h-96 rounded-lg shadow-lg bg-cover" style="background-image: url('{{ $project->getFirstMediaUrl('images') }}')">
                <section class="w-full h-full flex flex-col gap-4 justify-end p-8 bg-gradient-to-t from-white">
                    <p class="invisible group-hover:visible transition-all duration-400 translate-y-14 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 text-dark-blue text-xs text-ellipsis [text-shadow:_0_1px_0_rgb(255_255_255_/_40%)]">
                        {{ $project->description }}
                    </p>
                    <span class="rounded-md bg-clip-text text-dark-blue font-bold [text-shadow:_0_1px_0_rgb(255_255_255_/_40%)]">{{ $project->title }}</span>
                    <div class="flex justify-between gap-3">
                        @if ($project->published)
                            <x-icon class="w-6 h-6 text-dark-blue" name="signal" variant="solid" />
                        @else
                            <x-icon class="w-6 h-6 text-bittersweet" name="signal-slash" variant="solid" />
                        @endif
                        <div class="flex gap-3">
                            <a href="/projects/{{ $project->id }}/edit">
                                <x-icon class="w-6 h-6 text-manatee" name="pencil-square" variant="solid" />
                            </a>
                            <button @click="$dispatch('togglePopup', {id: {{ $project->id }} })"><x-icon class="cursor-pointer w-6 h-6 text-manatee" name="trash" variant="solid" /></button>
                        </div>
                    </div>
                </section>
            </article>
        @empty
            <span class="text-manatee text-sm self-center">You dont have any project</span>
        @endforelse
    </section>
    <section class="text-sm text-manatee">
        {{ $projects->links() }}
    </section>
    <livewire:popup text='Are you sure you want delete the item?' />
</div>
