@extends('dashboard.app')

@section('content')
<section>
    <div class="flex gap-4">
        <div class="basis-1/3 block aspect-[3/2] bg-contain bg-center bg-gray-500"></div>
        <div class="basis-2/3 p-4 bg-white border rounded">
            <form action="#" class="space-y-2 *:space-y-1">
                <div>
                    <label for="portofolio-new-name" class="dash-label">Portofolio's Name</label>
                    <input type="text" name="portofolio-new-name" id="portofolio-new-name" class="dash-input" placeholder="This is input for your portofolio's name">
                </div>
                <div>
                    <label for="portofolio-new-category" class="dash-label">Portofolio's Category</label>
                    <select name="portfolio-new-category" id="portofolio-new-category" class="dash-input w-fit">
                        <option disabled selected>Your portofolio's category</option>
                        <option value="1">Web</option>
                        <option value="2">Internet of Things</option>
                    </select>
                </div>
                <div>
                    <label for="portofolio-new-file" class="dash-label">Portofolio's Hero Image</label>
                    <input type="file" name="portofolio-new-fil" id="portofolio-new-file" class="dash-input text-sm">
                </div>
            </form>
        </div>
    </div>
</section>
@endsection