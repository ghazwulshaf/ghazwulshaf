@extends('app')

@section('children')

@include('homepage._layouts.header')
@yield('content')
@include('homepage._layouts.footer')

<button onclick="toTop()" class="fixed right-4 bottom-4 p-4 rounded bg-primary text-white">
    <i class="fa-solid fa-arrow-up-long"></i>
</button>

@endsection

@push('scripts')
<script>
    let screenHeight = screen.height
    let bodyHeight = document.body.offsetHeight

    if (bodyHeight < screenHeight) {
        document.body.classList.add("h-screen")
    } else {
        document.body.classList.remove("h-screen")
    }

    function toTop() {
        document.body.scrollTop = 0
        document.documentElement.scrollTop = 0
    }
</script>
@endpush