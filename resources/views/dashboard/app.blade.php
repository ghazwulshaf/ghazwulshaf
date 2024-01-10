@extends('app')

@section('children')
<main id="dashboard" class="w-full h-full flex">
    <div class="w-1/5 h-full">
        @include('dashboard._layouts.sidebar', ['class' => 'border-r'])
    </div>
    <div class="w-4/5 flex flex-col">
        @include('dashboard._layouts.topbar', ['class' => 'w-full ps-6 pe-12 py-6 border-b'])
        <div class="w-full h-full ps-6 pe-12 py-6 bg-gray-100">
            @yield('content')
        </div>
    </div>
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