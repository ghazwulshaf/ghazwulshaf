@extends('dashboard.app')

@section('content')
<section class="space-y-2">
    {{-- List Top Bar --}}
    <div class="w-full p-2 flex items-stretch gap-2 bg-white border rounded">
        <select name="" id="" class="dash-input w-fit text-gray-700 *:text-sm">
            <option disabled selected>Sort by:</option>
            <option value="">Name</option>
            <option value="">Category</option>

            <option disabled">-----</option>
            <option disabled>Group by:</option>
            <option value="">Category</option>
        </select>
        <div class="relative w-full">
            <input type="search" name="" id="" class="dash-input ps-8" placeholder="Search...">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>
        <button class="dash-action active"><i class="fa-solid fa-border-all"></i></button>
        <button class="dash-action"><i class="fa-solid fa-table-list"></i></button>
        <a href="#" class="dash-action flex items-center bg-primary-500 text-white"><i class="fa-solid fa-plus"></i></a>
    </div>
    {{-- List Contents --}}
    <div class="w-full grid grid-cols-2 gap-4">
        <div class="flex items-start gap-2">
            <div class="w-full dash-container flex items-start gap-2">
                <div class="block w-2/6 aspect-[3/2] bg-contain bg-center bg-gray-600"></div>
                <div class="space-y-1">
                    <span class="dash-badge bg-primary-500 text-white">Web</span>
                    <span class="block font-semibold">Ini adalah judul proyek</span>
                </div>
            </div>
            <div class="flex flex-col items-stretch gap-2">
                <a href="#" class="dash-button-ctr bg-blue-500 text-white"><i class="fa-solid fa-file-lines"></i></a>
                <a href="#" class="dash-button-ctr bg-red-500 text-white"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
        <div class="flex items-start gap-2">
            <div class="w-full dash-container flex items-start gap-2">
                <div class="block w-2/6 aspect-[3/2] bg-contain bg-center bg-gray-600"></div>
                <div class="space-y-1">
                    <span class="dash-badge bg-primary-500 text-white">Web</span>
                    <span class="block font-semibold">Ini adalah judul proyek</span>
                </div>
            </div>
            <div class="flex flex-col items-stretch gap-2">
                <a href="#" class="dash-button-ctr bg-blue-500 text-white"><i class="fa-solid fa-file-lines"></i></a>
                <a href="#" class="dash-button-ctr bg-red-500 text-white"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
        <div class="flex items-start gap-2">
            <div class="w-full dash-container flex items-start gap-2">
                <div class="block w-2/6 aspect-[3/2] bg-contain bg-center bg-gray-600"></div>
                <div class="space-y-1">
                    <span class="dash-badge bg-primary-500 text-white">Web</span>
                    <span class="block font-semibold">Ini adalah judul proyek</span>
                </div>
            </div>
            <div class="flex flex-col items-stretch gap-2">
                <a href="#" class="dash-button-ctr bg-blue-500 text-white"><i class="fa-solid fa-file-lines"></i></a>
                <a href="#" class="dash-button-ctr bg-red-500 text-white"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
        <div class="flex items-start gap-2">
            <div class="w-full dash-container flex items-start gap-2">
                <div class="block w-2/6 aspect-[3/2] bg-contain bg-center bg-gray-600"></div>
                <div class="space-y-1">
                    <span class="dash-badge bg-primary-500 text-white">Web</span>
                    <span class="block font-semibold">Ini adalah judul proyek</span>
                </div>
            </div>
            <div class="flex flex-col items-stretch gap-2">
                <a href="#" class="dash-button-ctr bg-blue-500 text-white"><i class="fa-solid fa-file-lines"></i></a>
                <a href="#" class="dash-button-ctr bg-red-500 text-white"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
        <div class="flex items-start gap-2">
            <div class="w-full dash-container flex items-start gap-2">
                <div class="block w-2/6 aspect-[3/2] bg-contain bg-center bg-gray-600"></div>
                <div class="space-y-1">
                    <span class="dash-badge bg-primary-500 text-white">Web</span>
                    <span class="block font-semibold">Ini adalah judul proyek</span>
                </div>
            </div>
            <div class="flex flex-col items-stretch gap-2">
                <a href="#" class="dash-button-ctr bg-blue-500 text-white"><i class="fa-solid fa-file-lines"></i></a>
                <a href="#" class="dash-button-ctr bg-red-500 text-white"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
        <div class="flex items-start gap-2">
            <div class="w-full dash-container flex items-start gap-2">
                <div class="block w-2/6 aspect-[3/2] bg-contain bg-center bg-gray-600"></div>
                <div class="space-y-1">
                    <span class="dash-badge bg-primary-500 text-white">Web</span>
                    <span class="block font-semibold">Ini adalah judul proyek</span>
                </div>
            </div>
            <div class="flex flex-col items-stretch gap-2">
                <a href="#" class="dash-button-ctr bg-blue-500 text-white"><i class="fa-solid fa-file-lines"></i></a>
                <a href="#" class="dash-button-ctr bg-red-500 text-white"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
        <div class="flex items-start gap-2">
            <div class="w-full dash-container flex items-start gap-2">
                <div class="block w-2/6 aspect-[3/2] bg-contain bg-center bg-gray-600"></div>
                <div class="space-y-1">
                    <span class="dash-badge bg-primary-500 text-white">Web</span>
                    <span class="block font-semibold">Ini adalah judul proyek</span>
                </div>
            </div>
            <div class="flex flex-col items-stretch gap-2">
                <a href="#" class="dash-button-ctr bg-blue-500 text-white"><i class="fa-solid fa-file-lines"></i></a>
                <a href="#" class="dash-button-ctr bg-red-500 text-white"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
        <div class="flex items-start gap-2">
            <div class="w-full dash-container flex items-start gap-2">
                <div class="block w-2/6 aspect-[3/2] bg-contain bg-center bg-gray-600"></div>
                <div class="space-y-1">
                    <span class="dash-badge bg-primary-500 text-white">Web</span>
                    <span class="block font-semibold">Ini adalah judul proyek</span>
                </div>
            </div>
            <div class="flex flex-col items-stretch gap-2">
                <a href="#" class="dash-button-ctr bg-blue-500 text-white"><i class="fa-solid fa-file-lines"></i></a>
                <a href="#" class="dash-button-ctr bg-red-500 text-white"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
        <div class="flex items-start gap-2">
            <div class="w-full dash-container flex items-start gap-2">
                <div class="block w-2/6 aspect-[3/2] bg-contain bg-center bg-gray-600"></div>
                <div class="space-y-1">
                    <span class="dash-badge bg-primary-500 text-white">Web</span>
                    <span class="block font-semibold">Ini adalah judul proyek</span>
                </div>
            </div>
            <div class="flex flex-col items-stretch gap-2">
                <a href="#" class="dash-button-ctr bg-blue-500 text-white"><i class="fa-solid fa-file-lines"></i></a>
                <a href="#" class="dash-button-ctr bg-red-500 text-white"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    {{-- List Pagination --}}
    <div class="sticky bottom-0 w-full p-4 bg-white border rounded">
        <div class="mx-auto flex w-fit items-center gap-4">
            <div>
                <span><i class="fa-solid fa-angle-left"></i></span>
            </div>
            <div class="flex items-center gap-2 *:dash-page-item">
                <span class="active">1</span>
                <span>2</span>
                <span>3</span>
            </div>
            <div>
                <span><i class="fa-solid fa-angle-right"></i></span>
            </div>
        </div>
    </div>
</section>
@endsection