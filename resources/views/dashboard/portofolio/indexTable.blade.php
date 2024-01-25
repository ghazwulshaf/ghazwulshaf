<table class="w-full dash-container">
    <tr class="*:font-semibold">
        <td class="w-16 text-center">No</td>
        <td class="w-28">Image</td>
        <td>Name</td>
        <td class="w-2/12">Category</td>
        <td class="w-2/12">Action</td>
    </tr>
    @foreach ($datas as $data)
    <tr>
        <form hidden id="portofolio-{{ $data['id'] }}-delete" action="{{ route('portofolios.destroy', $data['id']) }}" method="POST" onsubmit="if(!confirm('Are you sure to delete data?')){return false;}">
            @method('DELETE')
            @csrf
        </form>
        <td class="w-16 text-center">{{ $loop->iteration }}</td>
        <td class="w-28"><div class="block aspect-[3/2] w-24 bg-cover bg-center" @isset($data['path_image']) style="background-image: url({{ asset('storage/'.$data['path_image']) }})" @endisset></div> </td>
        <td>{{ $data['name'] }}</td>
        <td class="w-2/12">{{ $data['category'] }}</td>
        <td class="w-2/12">
            <a href="{{ route('admin.portofolio.view', ['id' => $data['id']]) }}" class="dash-button-ctr bg-blue-500 text-white" title="Show"><i class="fa-solid fa-file-lines"></i></a>
            <button type="submit" form="portofolio-{{ $data['id'] }}-delete" class="dash-button-ctr bg-red-500 text-white" title="Delete"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>
    @endforeach
</table>

{{-- List Pagination --}}
{{ $datas->links() }}