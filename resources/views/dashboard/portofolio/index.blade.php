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
            <input type="search" name="search" id="search" class="dash-input ps-8" placeholder="Search...">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>
        <button class="dash-action active"><i class="fa-solid fa-border-all"></i></button>
        <button class="dash-action"><i class="fa-solid fa-table-list"></i></button>
        <a href="{{ route('admin.portofolio.create') }}" class="dash-action flex items-center bg-primary-500 text-white"><i class="fa-solid fa-plus"></i></a>
    </div>

    {{-- List Contents --}}
    <div id="list">
        {{-- @include('dashboard.portofolio.indexGrid', ['datas' => $portofolios]) --}}
        {!! $items !!}
    </div>

    {{-- List Pagination --}}
    {{ $portofolios->links() }}
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            $value = $(this).val();

            $.ajax({
                type: 'GET',
                url: "{{ route('admin.portofolio.search') }}",
                data: { search: $value },

                success: function (data) {
                    console.log(data);
                    $('#list').html(data);
                }
            })
        })
    })
</script>
@endpush