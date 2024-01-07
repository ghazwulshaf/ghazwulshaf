@extends('homepage.app')

@section('content')
<section class="block w-full h-screen"></section>

<section class="px-24 py-12 bg-secondary *:text-white text-center space-y-6">
    <p class="text-lg font-semibold">
        Ini adalah bagian deskripsi diri
    </p>

    <a href="#" class="btn-outline">About Me</a>
</section>

<section class="px-24 py-24 space-y-12">
    <div>
        <span class="text-xl font-semibold">Proyekan</span>
    </div>
    <div class="grid grid-cols-2 gap-6">
        <div class="flex gap-4">
            <div class="block aspect-[3/2] basis-1/2 bg-cover bg-center bg-primary-500"></div>
            <div class="block relative basis-1/2">
                <span class="block text-lg font-semibold">Nama Proyek</span>
                <p class="absolute bottom-0 left-0 right-0 text-justify line-clamp-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non repudiandae voluptatum accusantium harum sequi atque delectus laudantium tempora commodi itaque voluptas aliquid quo praesentium, illo animi. Quo repudiandae ad eum!</p>
            </div>
        </div>
    </div>
</section>

<section class="px-24 py-12 bg-tertiary">
    <ul class="flex w-full justify-center items-center gap-32">
        <li><img src="{{ asset('assets/images/web.png') }}" alt="Website" class="h-12"></li>
        <li><img src="{{ asset('assets/images/iot.png') }}" alt="IoT" class="h-12"></li>
        <li><img src="{{ asset('assets/images/artificial-intelligence.png') }}" alt="AI" class="h-12"></li>
    </ul>
</section>
@endsection