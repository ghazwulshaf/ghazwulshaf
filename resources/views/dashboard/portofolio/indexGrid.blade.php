<div class="w-full grid grid-cols-2 gap-4">
    @foreach ($datas as $data)
    <form hidden id="portofolio-{{ $data['id'] }}-delete" action="{{ route('portofolios.destroy', $data['id']) }}" method="POST" onsubmit="if(!confirm('Are you sure to delete data?')){return false;}">
        @method('DELETE')
        @csrf
    </form>
    <div class="flex items-start gap-2">
        <div class="w-full dash-container flex items-start gap-2">
            <div class="block w-2/6 aspect-[3/2] bg-cover bg-center" @isset($data['path_image']) style="background-image: url({{ asset('storage/'.$data['path_image']) }})" @endisset></div> 
            <div class="space-y-1">
                <span class="dash-badge bg-primary-500 text-white">{{ $data['category'] }}</span>
                <span class="block font-semibold">{{ $data['name'] }}</span>
            </div>
        </div>
        <div class="flex flex-col items-stretch gap-2">
            <a href="#" class="dash-button-ctr bg-blue-500 text-white" title="Show"><i class="fa-solid fa-file-lines"></i></a>
            <button type="submit" form="portofolio-{{ $data['id'] }}-delete" class="dash-button-ctr bg-red-500 text-white" title="Delete"><i class="fa-solid fa-trash"></i></button>
        </div>
    </div>
    @endforeach
</div>