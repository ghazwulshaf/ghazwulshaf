@extends('app')

@section('children')
<main id="dashboard" class="w-full">
    @yield('content')
</main>
@endsection

@push('scripts')
<script>
    const dashboard = document.getElementById("dashboard")

    if (dashboard.offsetHeight < screen.height) {
        dashboard.classList.add("h-screen")
    } else {
        dashboard.classList.remove("h-screen")
    }
</script>
@endpush