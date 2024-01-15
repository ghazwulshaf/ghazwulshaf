@extends('dashboard.app')

@section('content')
<section class="space-y-4">
    <div class="flex gap-4">
        <div id="portofolio-new-image" class="basis-1/3 block aspect-[3/2] bg-cover bg-center bg-white"></div>
        <div class="basis-2/3 p-4 bg-white border rounded">
            <form id="portofolio-new" action="{{ route('portofolios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-2 *:space-y-1">
                @csrf
                <div>
                    <label for="portofolio-new-name" class="dash-label">Portofolio's Name</label>
                    <input type="text" name="portofolio-new-name" id="portofolio-new-name" class="dash-input" placeholder="This is input for your portofolio's name" required>
                </div>
                <div>
                    <label for="portofolio-new-category" class="dash-label">Portofolio's Category</label>
                    <select name="portofolio-new-category" id="portofolio-new-category" class="dash-input w-fit" required>
                        <option disabled selected>Your portofolio's category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="portofolio-new-file" class="dash-label">Portofolio's Hero Image</label>
                    <div class="flex items-start gap-2">
                        <input type="file" name="portofolio-new-file" id="portofolio-new-file" class="dash-input text-sm" onchange="changeImage('portofolio-new')">
                        <button type="submit" form="portofolio-new" class="dash-button bg-primary-500 text-white"><i class="fa-solid fa-plus"></i>Add Portofolio</button>
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
        <textarea form="portofolio-new" name="portofolio-new-content" id="myeditorinstance">Hello, World!</textarea>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function changeImage(nodeId) {
        const nodeImage = document.getElementById(nodeId + '-image')
        const nodeInput= document.getElementById(nodeId + '-file')

        nodeImage.style.backgroundImage = "url('"+URL.createObjectURL(nodeInput.files[0])+"')"
    }
</script>
@endpush