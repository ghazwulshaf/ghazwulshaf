@extends('dashboard.app')

@section('content')
<section class="space-y-2">
    {{-- List Top Bar --}}
    <div class="w-full p-2 flex items-stretch gap-2 bg-white border rounded">
        {{-- <select name="sort" id="sort" class="dash-input w-fit text-gray-700 *:text-sm">
            <option disabled selected>Sort by:</option>
            <option value="name">Name</option>
            <option value="category">Category</option>

            <option disabled">-----</option>
            <option disabled>Group by:</option>
            <option value="">Category</option>
        </select> --}}
        <div class="relative w-full">
            <input type="search" name="search" id="search" class="dash-input ps-8" placeholder="Search...">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>
        {{-- <div class="relative flex">
            <input type="radio" name="mode" id="mode" value="grid" title="grid" checked class="peer absolute opacity-0 cursor-pointer top-0 left-0 w-full h-full">
            <span class="dash-action flex items-center peer-checked:active"><i class="fa-solid fa-border-all"></i></span>
        </div>
        <div class="relative flex">
            <input type="radio" name="mode" id="mode" value="table" title="table" class="peer absolute opacity-0 cursor-pointer top-0 left-0 w-full h-full">
            <span class="dash-action flex items-center peer-checked:active"><i class="fa-solid fa-table-list"></i></span>
        </div> --}}
        <a href="{{ route('admin.portofolio.create') }}" class="dash-action flex items-center bg-primary-500 text-white"><i class="fa-solid fa-plus"></i></a>
    </div>

    {{-- List Contents --}}
    <div id="list" class="space-y-4">
        {!! $items !!}
    </div>

    {{-- List Pagination --}}
    {{-- {{ $portofolios->links() }} --}}
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // $('#sort').on('change', function () {
        //     $sort = $(this).val();
        //     $search = $('#search').val();
        //     // $mode = $('input[type=radio][name=mode]').val();
            
        //     $.ajax({
        //         type: 'GET',
        //         url: "{{ route('admin.portofolio.sort') }}",
        //         data: { sort: $sort, search: $search },
                
        //         success: function (data) {
        //             $('#list').html(data);
        //         }
        //     })
        // });

        $('#search').on('keyup', function () {
            // $sort = $('#sort').val();
            $search = $(this).val();
            // $mode = $('input[type=radio][name=mode]').val();

            $.ajax({
                type: 'GET',
                url: "{{ route('admin.portofolio.search') }}",
                data: { search: $search },

                success: function (data) {
                    $('#list').html(data);
                }
            })
        });

        // $('input[type=radio][name=mode]').on('change', function () {
        //     $sort = $('#sort').val();
        //     $search = $('#search').val();
        //     $mode = $(this).val();

        //     $.ajax({
        //         type: 'GET',
        //         url: "{{ route('admin.portofolio.mode') }}",
        //         data: { sort: $sort, search: $search, mode: $mode },

        //         success: function (data) {
        //             $('#list').html(data);
        //         }
        //     })
        // })
    })
</script>
@endpush