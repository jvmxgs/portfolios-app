<form wire:submit.prevent="save" class="flex flex-col gap-10">
    <section class="flex justify-between h-12">
        <h1 class="text-2xl text-dark-blue font-semibold">New Project</h1>
    </section>
    <section class="grid grid-cols-3 gap-8">
        <x-errors class="col-span-3"/>
        <label class="text-sm text-dark-blue font-normal flex flex-col gap-2 w-full col-span-3">
            Title
            <input type="text" wire:model="title" class="rounded border border-azureish-white w-full h-12 text-manatee text-sm focus:border-dark-blue focus:ring-0">
        </label>
        <label class="text-sm text-dark-blue font-normal flex flex-col gap-2 w-full col-span-2">
            Description
            <textarea wire:model="description" class="h-full rounded border border-azureish-white w-full text-manatee text-sm focus:border-dark-blue focus:ring-0">
            </textarea>
        </label>
        <label class="text-sm text-dark-blue font-normal flex flex-col gap-2 w-full">
            Image
            <input type="file" wire:model="image" class="rounded border border-azureish-white w-full h-12 text-manatee text-sm focus:border-dark-blue focus:ring-0">
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Image Preview">
                @else
                <img src="https://uploader-assets.s3.ap-south-1.amazonaws.com/codepen-default-placeholder.png" alt="Placeholder Image">
            @endif
        </label>
        <div class="col-start-3 text-dark-blue flex flex-col items-end">
            <x-checkbox id="publish_schedule" label="Schedule project" lg wire:model.defer="model" class="bg-white border-azureish-white" />
            <x-datetime-picker
                label="Appointment Date"
                placeholder="Appointment Date"
                wire:model.defer="normalPicker"
            />
        </div>
        <div class="flex space-x-2 h-12 col-span-2 col-start-2 justify-end">
            <button class="bg-sail text-dark-blue text-sm px-10 rounded-lg">Save as Draft</button>
            <button class="bg-bittersweet text-white text-sm px-10 rounded-lg">Publish</button>
        </div>
    </section>
</form>
