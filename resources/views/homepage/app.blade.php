@extends('app')

@section('children')

@include('homepage._layouts.header')
@yield('content')
@include('homepage._layouts.footer')

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