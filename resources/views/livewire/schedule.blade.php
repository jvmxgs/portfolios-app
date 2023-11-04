<div class="col-start-2 col-span-2 flex gap-6 justify-end items-center">
    @if($showDatePicker)
        <div class="col-start-3 text-downriver flex flex-col items-end">
            <x-datetime-picker
                label="Publish date"
                placeholder="Publish date"
                wire:model.defer="publishDate"
                class="col-start-3"
                without-timezone
            />
        </div>
    @endif
    <div class="text-downriver">
        <x-checkbox id="showDatePicker" label="Schedule publication" lg wire:click="checkboxToogle" class="bg-white border-azureish-white col-start-3" />
    </div>
</div>
