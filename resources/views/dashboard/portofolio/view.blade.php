@extends('dashboard.app')

@section('content')
<section>
    <div class="dash-container">
        <div class="block w-full aspect-[3/1] bg-cover bg-center bg-gray-200" @isset($data['path_image']) style="background-image: url({{ asset('storage/'.$data['path_image']) }})" @endisset></div>
        <div class="mt-2">
            <div>
                <span class="block text-xl font-semibold">{{ $data['name'] }}</span>
                <span class="block text-gray-500">{{ $data['category'] }}</span>
            </div>
            <div class="mt-2">
                {!! $data['content'] !!}
            </div>
        </div>
    </div>

    <div>
        <form hidden id="portofolio-{{ $data['id'] }}-delete" action="{{ route('portofolios.destroy', $data['id']) }}" method="POST" onsubmit="if(!confirm('Are you sure to delete data?')){return false;}">
            @method('DELETE')
            @csrf
        </form>
        <div class="dash-container flex justify-end items-center gap-2">
            <a href="{{ route('admin.portofolio.edit', ['id' => $data['id']]) }}" class="dash-button bg-blue-500 text-white"><i class="fa-solid fa-pen"></i>Edit</a>
            <button type="submit" form="portofolio-{{ $data['id'] }}-delete" class="dash-button bg-red-500 text-white"><i class="fa-solid fa-trash"></i>Delete</button>
        </div>
    </div>
</section>
@endsection