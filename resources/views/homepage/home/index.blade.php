@extends('homepage.app')

@section('content')
<section class="block w-full h-screen"></section>

<section class="px-24 py-24 bg-secondary *:text-white text-center space-y-12">
    <p class="text-lg font-semibold">
        Ini adalah bagian deskripsi diri
    </p>

    <a href="#" class="btn-outline-dark">About Me</a>
</section>

<section class="px-24 py-24 space-y-12 bg-white">
    <div class="inline-block pb-2 pr-4 border-b-2 border-gray-950">
        <span class="text-xl font-semibold">Proyekan</span>
    </div>
    <div class="grid grid-cols-2 gap-6">
        @foreach ($portofolios as $portofolio)
        <div class="flex gap-4">
            <div class="block aspect-[3/2] basis-1/2 bg-cover bg-center" style="background-image: url({{ asset($portofolio['image'] ? 'storage/'.$portofolio['image'] : 'assets/images/No-Image-Placeholder.png') }})"></div>
            <div class="block relative basis-1/2">
                <span class="block text-lg font-semibold">{{ $portofolio['name'] }}</span>
                <div class="absolute bottom-0 left-0 right-0">
                    <p class="text-justify line-clamp-3">{!! $portofolio['content'] !!}</p>
                    <div class="flex items-center justify-between mt-2 pt-1 border-t border-gray-500 *:text-sm *:text-gray-500">
                        <span>{{ $portofolio['category'] }}</span>
                        <span>2022</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center !mt-24">
        <a href="#" class="btn-outline">Show More</a>
    </div>
</section>

<section class="px-24 py-24 bg-transparent">
    <ul class="flex w-full justify-center items-center gap-32 *:flex *:flex-col *:items-center *:gap-2">
        <li>
            <img src="{{ asset('assets/images/web.png') }}" alt="Website" class="h-12">
            <span class="text-lg font-semibold">Web Developer</span>
        </li>
        <li>
            <img src="{{ asset('assets/images/iot.png') }}" alt="IoT" class="h-12">
            <span class="text-lg font-semibold">Internet of Things</span>
        </li>
        <li>
            <img src="{{ asset('assets/images/artificial-intelligence.png') }}" alt="AI" class="h-12">
            <span class="text-lg font-semibold">Artificial Intelligence</span>
        </li>
    </ul>
</section>
@endsection