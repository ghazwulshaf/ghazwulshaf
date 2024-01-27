@extends('app')

@section('children')

<section>
    @include('homepage._layouts.header')
    @include('homepage._layouts.pagetitle')
    <div class="flex items-start gap-8 px-24 py-12">
        @if (request()->routeIs('homepage.contacts*'))
        <div class="basis-1/3">
            @yield('sidebar')
        </div>
        <div class="basis-2/3">
            @yield('content')
        </div>
        @else
        <div class="basis-2/3">
            @yield('content')
        </div>
        <div class="basis-1/3 bg-gray-500">
            @include('homepage._layouts.sidebar')
        </div>
        @include('homepage._layouts.footer')
        @endif
    </div>
</section>

<button onclick="toTop()" class="fixed right-4 bottom-4 p-4 rounded bg-primary-500 text-white">
    <i class="fa-solid fa-arrow-up-long"></i>
</button>

@endsection

@push('scripts')
<script>
    function toTop() {
        document.body.scrollTop = 0
        document.documentElement.scrollTop = 0
    }
</script>
@endpush