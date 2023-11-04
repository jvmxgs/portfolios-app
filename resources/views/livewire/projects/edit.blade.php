<form wire:submit.prevent="update" class="flex flex-col gap-10">
    <section class="flex justify-between h-12">
        <h1 class="text-2xl text-downriver font-semibold">Update Project</h1>
        <livewire:button type='submit' text='Save'>
    </section>
    <section class="grid grid-cols-2 gap-8">
        <label class="text-sm text-downriver font-normal flex flex-col gap-2 w-full">
            Title @error('title') <span class="text-bittersweet">{{ $message }}</span> @enderror
            <input type="text" wire:model="title" class="rounded border border-azureish-white w-full h-12 text-manatee text-sm focus:border-downriver focus:ring-0">
        </label>
        <label class="text-sm text-downriver font-normal flex flex-col gap-2 w-full">
            Image @error('image') <span class="text-bittersweet">{{ $message }}</span> @enderror
            <input type="file" wire:model="image" class="rounded border border-azureish-white w-full h-12 text-manatee text-sm focus:border-downriver focus:ring-0">
        </label>
        <label class="text-sm text-downriver font-normal flex flex-col gap-2 w-full col-span-2">
            Description Image @error('description') <span class="text-bittersweet">{{ $message }}</span> @enderror
            <textarea wire:model="description" class="rounded border border-azureish-white w-full h-12 text-manatee text-sm focus:border-downriver focus:ring-0">
            </textarea>
        </label>
        <div class="justify-self-end col-span-2 text-sm text-downriver font-normal relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
            Published
            <input type="checkbox" value="false" wire:model="published" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
            <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-manatee cursor-pointer"></label>
        </div>
    </section>
    <style>
    .toggle-checkbox:checked {
        @apply: right-0 border-downriver;
        right: 0;
        border-color: #0C1E5B;
    }
    .toggle-checkbox:checked + .toggle-label {
        @apply: bg-bittersweet;
        background-color: #0C1E5B;
    }
    </style>
</form>
