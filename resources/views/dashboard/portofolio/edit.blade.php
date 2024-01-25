@extends('dashboard.app')

@section('content')
<section class="space-y-4">
    <div class="flex gap-4">
        <div id="image" class="basis-1/3 block aspect-[3/2] bg-cover bg-center bg-white" @isset($data['path_image']) style="background-image: url({{ asset('storage/'.$data['path_image']) }})" @endisset></div>
        <div class="basis-2/3 p-4 bg-white border rounded">
            <form id="portofolio-edit" action="{{ route('portofolios.update', ['portofolio' => $data['id']]) }}" method="POST" enctype="multipart/form-data" class="space-y-2 *:space-y-1">
                @method('PUT')
                @csrf
                <div>
                    <label for="name" class="dash-label">Portofolio's Name</label>
                    <input type="text" name="name" id="name" value="{{ $data['name'] }}" class="dash-input" placeholder="This is input for your portofolio's name" required>
                </div>
                <div>
                    <label for="category" class="dash-label">Portofolio's Category</label>
                    <select name="category" id="category" class="dash-input w-fit" required>
                        <option disabled selected>Your portofolio's category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" {{ $data['category_id'] == $category['id'] ? 'selected' : '' }}>{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="file" class="dash-label">Portofolio's Hero Image</label>
                    <div class="flex items-start gap-2">
                        <input type="file" name="file" id="file" class="dash-input text-sm" onchange="changeImage()">
                        <button type="submit" form="portofolio-edit" class="dash-button bg-green-500 text-white"><i class="fa-solid fa-floppy-disk"></i>Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="space-y-2">
        <div class="flex items-center gap-2">
            <span class="text-nowrap">Portofolio's Body Contents</span>
            <div class="dash-line"></div>
        </div>
        <textarea form="portofolio-edit" name="content" id="myeditorinstance">{!! $data['content'] !!}</textarea>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function changeImage() {
        const nodeImage = document.getElementById('image')
        const nodeInput= document.getElementById('file')

        nodeImage.style.backgroundImage = "url('"+URL.createObjectURL(nodeInput.files[0])+"')"
    }
</script>
@endpush