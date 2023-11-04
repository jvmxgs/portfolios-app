<form wire:submit.prevent="save" class="flex flex-col gap-10">
    <section class="flex justify-between h-12">
        <h1 class="text-2xl text-downriver font-semibold">New Project</h1>
    </section>
    <section class="grid grid-cols-3 gap-8">
        <x-errors class="col-span-3"/>
        <label class="text-sm text-downriver font-normal flex flex-col gap-2 w-full col-span-3">
            Title
            <input type="text" wire:model="title" class="rounded border border-azureish-white w-full h-12 text-manatee text-sm focus:border-downriver focus:ring-0">
        </label>
        <label class="text-sm text-downriver font-normal flex flex-col gap-2 w-full col-span-2">
            Description
            <textarea wire:model="description" class="h-full rounded border border-azureish-white w-full text-manatee text-sm focus:border-downriver focus:ring-0">
            </textarea>
        </label>
        <label class="text-sm text-downriver font-normal flex flex-col gap-2 w-full">
            Image
            <input type="file" wire:model="image" class="rounded border border-azureish-white w-full h-12 text-manatee text-sm focus:border-downriver focus:ring-0">
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Image Preview">
                @else
                <img src="https://uploader-assets.s3.ap-south-1.amazonaws.com/codepen-default-placeholder.png" alt="Placeholder Image">
            @endif
        </label>
        <div class="col-start-2 col-span-2 flex gap-6 justify-end items-center">
            @if($scheduled)
                <div class="col-start-3 text-downriver flex flex-col items-end">
                    <x-datetime-picker
                        label="Publish date"
                        placeholder="Publish date"
                        wire:model.defer="scheduledAt"
                        class="col-start-3"
                        without-timezone
                    />
                </div>
            @endif
            <div class="text-downriver">
                <x-checkbox id="showDatePicker" label="Schedule publication" lg wire:click="checkboxToogle" class="bg-white border-azureish-white col-start-3" />
            </div>
        </div>
        <div class="flex h-12 col-span-2 col-start-2 justify-end">
            <x-button secondary label="Save as draft" wire:click="saveDraft" class="px-8 rounded-r-none rounded-l-lg" />
            <x-button primary label="Publish" wire:click="publish" class="px-8 rounded-l-none rounded-r-lg border-l border-white" />
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </section>
</form>
