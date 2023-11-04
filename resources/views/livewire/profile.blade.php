<div class="h-full bg-white rounded-lg text-downriver font-bold text-xs p-5 flex items-center gap-2.5">
    <img src="{{ $user->getFirstMediaUrl('avatar') }}" class="w-[30px] h-[30px] rounded-full"/>
    <span class="flex items-center ">{{ $user->name }}<!-- <x-icon name="chevron-down" mini /> --></span>
</div>
