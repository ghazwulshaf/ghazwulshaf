@extends('homepage.app-sec')

@section('content')
<section class="space-y-6">
    <div class="w-full">
        <input type="search" name="search" id="search" placeholder="Search more detail...">
    </div>
    <div class="w-full grid grid-cols-1 gap-4">
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
    <div class="w-full !mt-12">
        {{ $portofolios->links() }}
    </div>
</section>
@endsection