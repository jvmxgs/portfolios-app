<div>
    @if ($isPopupVisible)
        <article class="fixed inset-0 w-full h-full bg-opacity-70 bg-black flex justify-center items-center">
            <section class="bg-white shadow-xl rounded-lg p-8 w-72 h-auto flex flex-col gap-6">
                <h3 class="text-dark-blue font-semibold">{{ $text }}</h3>
                <div class="flex h-12 gap-2">
                    <button type="button" wire:click="closePopup" class="flex justify-center items-center w-40 h-full rounded-lg font-bold text-xs bg-light-blue text-dark-blue">
                        Close
                    </button>
                    <button type="button" wire:click="delete" class="flex justify-center items-center w-40 h-full rounded-lg font-bold text-xs text-white bg-bittersweet">
                        Delete
                    </button>
                </div>
            </section>
        </article>
    @endif
</div>
