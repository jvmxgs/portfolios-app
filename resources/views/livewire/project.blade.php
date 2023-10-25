<div class="flex flex-col gap-10">
    <h1 class="text-2xl text-dark-blue font-semibold">Projects</h1>
    <section class="grid grid-cols-3 gap-8">
        @foreach ($projects as $project)
            <article class="group w-full h-96 rounded-lg shadow-lg bg-cover bg-[url('https://s3-alpha.figma.com/hub/file/1080378377/0dabb111-fb1a-4ad3-9052-0ac0d3549ef5-cover.png')]">
                <section class="w-full h-full flex flex-col gap-4 justify-end p-8 bg-gradient-to-t from-white">
                    <p class="invisible group-hover:visible transition-all duration-400 translate-y-14 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 text-dark-blue text-xs text-ellipsis [text-shadow:_0_1px_0_rgb(255_255_255_/_40%)]">
                        {{ $project->description }}
                    </p>
                    <span class="rounded-md bg-clip-text text-dark-blue font-bold [text-shadow:_0_1px_0_rgb(255_255_255_/_40%)]">{{ $project->title }}</span>
                    <div class="flex justify-end gap-3">
                        <x-icon class="w-6 h-6 text-manatee" name="pencil-square" variant="solid" />
                        <x-icon class="w-6 h-6 text-manatee" name="trash" variant="solid" />
                    </div>
                </section>
            </article>
        @endforeach
    </section>
</div>
