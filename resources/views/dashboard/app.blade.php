@extends('app')

@section('children')
<main id="dashboard" class="w-full min-h-screen flex">
    <div class="sticky top-0 w-1/5 h-screen">
        @include('dashboard._layouts.sidebar', ['class' => 'border-r'])
    </div>
    {{-- <div class="block content-[''] w-1/5 h-screen"></div> --}}
    <div class="w-4/5 flex flex-col">
        @include('dashboard._layouts.topbar', ['class' => 'sticky top-0 w-full ps-6 pe-12 py-6 border-b', 'title' => isset($title) ? $title : 'Dashboard'])
        <div class="w-full h-full ps-6 pe-12 py-6 bg-gray-100">
            @yield('content')
        </div>
    </div>
    
    <button onclick="toTop()" class="fixed right-2 bottom-6 p-3 rounded bg-gray-600 text-white text-xs hover:shadow">
        <i class="fa-solid fa-arrow-up-long"></i>
    </button>
</main>
@endsection

@push('scripts')
<script>
    function toTop() {
        document.body.scrollTop = 0
        document.documentElement.scrollTop = 0
    }
</script>
@endpush