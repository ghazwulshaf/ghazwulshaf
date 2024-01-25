@extends('app')

@section('children')

<section class="bg-cover bg-center bg-fixed" style="background-image: url({{ asset('assets/images/homepage-background.png') }})">
    @include('homepage._layouts.header')
    @yield('content')
    @include('homepage._layouts.footer')
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