@extends('layouts.base')

@section('body')
    <main class="xl:max-w-7xl mx-auto flex flex-col gap-9 pt-9">
        <section>
            <h1 class="text-5xl font-tilt-neon text-dark-blue">Portfolio</h1>
        </section>
        <section class="h-12 flex justify-between items-center">
            <div class="flex gap-5 h-12">
                <livewire:profile>
                <livewire:button text='Account in review'>
                <div class="rounded-lg bg-white flex justify-center items-center w-[501px] px-5">
                    <input type="text" class="flex-grow text-sm border-0 px-0 w-36 h-5 border-transparent focus:border-transparent focus:ring-0" />
                    <button class="capitalize text-sm text-dark-blue font-bold flex gap-2"><x-heroicons::mini.solid.magnifying-glass class="w-5 h-5" /> Search</button>
                </div>
                <livewire:link primary text='Create' to='/projects/create' />
            </div>
        </section>
        <nav class="w-full h-24 bg-white rounded-xl flex items-center p-9">
            <ul class="flex">
                <livewire:navlink to="/" label="Home">
                <livewire:navlink to="/projects" label="Projects">
                <livewire:navlink to="/liked" label="Liked">
            </ul>
        </nav>
        <section class="bg-white rounded-xl p-9">
            @yield('content')

            @isset($slot)
                {{ $slot }}
            @endisset
        </section>
    </main>
@endsection
