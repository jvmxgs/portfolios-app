<div class="flex flex-col gap-10">
    <section class="flex justify-between">
        <h1 class="text-2xl text-downriver font-semibold">Deleted Projects</h1>
        <div id='actionButtons' class="invisible">
            <x-button.circle @click="deselectAll" primary icon="x" />
            <x-button @click="restoreSelected" icon="reply" primary flat label="Restore" />
            <x-button @click="deletePermanentlySelected" icon="trash" primary flat label="Delete permanently" />
        </div>
    </section>
    <section class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($projects as $project)
            <article id="project_{{ $project->id }}" class="group w-full h-96 rounded-lg shadow-lg bg-cover" style="background-image: url('{{ $project->getFirstMediaUrl('images') }}')">
                <section class="w-full h-full flex flex-col gap-4 justify-end p-8 bg-gradient-to-t from-white relative">
                    <button @click="selectItem('{{ $project->id }}', event)" class="invisible group-hover:visible absolute top-3 right-3">
                        <x-icon class="cursor-pointer w-6 h-6 fill-white" name="check-circle" solid />
                    </button>
                    <p class="invisible group-hover:visible transition-all duration-400 translate-y-14 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 text-downriver text-xs text-ellipsis [text-shadow:_0_1px_0_rgb(255_255_255_/_40%)]">
                        {{ $project->description }}
                    </p>
                    <p class="rounded-md bg-clip-text text-downriver font-bold [text-shadow:_0_1px_0_rgb(255_255_255_/_40%)]">{{ $project->title }} by <span class="text-bittersweet">{{ $project->user->name }}</span></p>
                </section>
            </article>
        @empty
            <span class="text-manatee text-sm self-center">You don't have any deleted project</span>
        @endforelse
    </section>
    <section class="text-sm text-manatee">
        {{ $projects->links() }}
    </section>
    <livewire:popup />
    <script type="text/javascript">
        var itemsSelected = []
        var actionButtons = document.getElementById('actionButtons')

        function selectItem(id, event)
        {
            var art = event.currentTarget.parentElement.parentElement

            markItem(art)

            var index = itemsSelected.indexOf(id);
            if (index !== -1) {
                itemsSelected.splice(index, 1)
                updateButtons()
                return
            }

            itemsSelected.push(id)
            updateButtons()
        }

        function markItem (art) {
            var btn = art.firstElementChild.firstElementChild
            var icon = btn.firstElementChild

            art.classList.toggle('border-4')
            art.classList.toggle('border-bittersweet')
            btn.classList.toggle('invisible')
            icon.classList.toggle('fill-white')
            icon.classList.toggle('fill-bittersweet')
        }

        function updateButtons()
        {
            if (itemsSelected.length > 0) {
                if (actionButtons.classList.contains('invisible')) {
                    actionButtons.classList.remove('invisible')
                }
                return
            }

            if (!actionButtons.classList.contains('invisible')) {
                actionButtons.classList.add('invisible')
            }
        }

        function deselectAll()
        {
            itemsSelected.forEach(id => {
                var item = document.getElementById('project_' + id)

                markItem(item)
            })

            itemsSelected = []
            updateButtons()
        }

        function restoreSelected() {
            var data = [
                itemsSelected,
                'restoreSelected',
                'You want to restore selected items?',
                'Restore Selected'
            ]
            this.$dispatch('showPopup', data)
            itemsSelected = []
        }

        function deletePermanentlySelected() {
            var data = [
                itemsSelected,
                'deletePermanentlySelected',
                'Delete Selected Projects',
                'Delete permanently'
            ]
            this.$dispatch('showPopup', data)
            itemsSelected = []
        }
    </script>
</div>

