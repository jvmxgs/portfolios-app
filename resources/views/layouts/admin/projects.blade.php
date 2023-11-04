@extends('layouts.admin.base')

@section('main_content')
    <div class="flex gap-5">
        <aside class="bg-white rounded-xl p-9 md:w-56 lg:w-72 shrink-0">
            <h5 class="font-bold text-downriver pb-10">My projects</h5>
            <ul class="flex flex-col gap-3">
                <livewire:navlink to="/projects/create" label="New">
                <livewire:navlink to="/projects" label="Explore">
                <livewire:navlink to="/projects/scheduled" label="Scheduled">
                <livewire:navlink to="/projects/trash" label="Trash">
            </ul>
        </aside>
        <section class="bg-white rounded-xl p-9 grow">
            @yield('content')
            @isset($slot)
                {{ $slot }}
            @endisset
        </section>
    </div>
@endsection
