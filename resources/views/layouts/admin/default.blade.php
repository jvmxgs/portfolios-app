@extends('layouts.admin.base')

@section('main_content')
    <section class="bg-white rounded-xl p-9">
        @yield('content')
        @isset($slot)
            {{ $slot }}
        @endisset
    </section>
@endsection
