@extends('layouts.base')

@section('body')
    <main class="w-full xl:max-w-7xl mx-auto flex flex-col gap-9 pt-9 px-2 md:px-0">
        <section class="flex justify-between items-baseline">
            <h1 class="text-5xl font-tilt-neon text-downriver">Portfolio</h1>
            @if (auth()->check())
                <livewire:auth.logout class="block md:hidden">
            @else
                <a href="/login" class="md:hidden flex text-md text-manatee">
                    Login <x-icon name="login" class="text-manatee cursor-pointer w-6 h-6 ml-2" />
                </a>
            @endif
        </section>
        <section class="md:h-12 flex flex-col md:flex-row justify-between items-center">
            <div class="flex flex-col md:flex-row gap-5 md:h-12 w-full">
                @if (auth()->check())
                    <livewire:profile>
                @endif
                <!-- <livewire:button text='Account in review'> -->
                <div class="rounded-lg bg-white flex justify-start items-center w-full h-12 md:w-[501px] px-5">
                    <input type="text" wire:model="searchInput" class="text-sm border-0 px-0 w-full h-5 border-transparent focus:border-transparent focus:ring-0" />
                    <button @click="$dispatch('searchh')" class="capitalize text-sm text-downriver font-bold flex gap-2"><x-icon name="search" class="stroke-downriver cursor-pointer w-5 h-5" /> Search</button>
                </div>
                <livewire:link primary text='Create' to='/projects/create' class="hidden md:flex"/>
            </div>
            @if (auth()->check())
                <livewire:auth.logout class="hidden md:block">
            @else
                <a href="/login" class="md:flex text-md text-manatee hidden">
                    Login <x-icon name="login" class="text-manatee cursor-pointer w-6 h-6 ml-2" />
                </a>
            @endif
        </section>
        @if (auth()->check())
            <nav class="w-full h-24 bg-white rounded-xl flex items-center p-9">
                <ul class="flex">
                    <livewire:navlink primary to="/" label="Home">
                    <livewire:navlink primary to="/projects" label="Projects">
                    <livewire:navlink primary to="/liked" label="Liked">
                </ul>
            </nav>
        @endif

        @yield('main_content')
    </main>
@endsection
