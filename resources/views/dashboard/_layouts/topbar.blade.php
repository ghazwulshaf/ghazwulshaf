<section class="{{ isset($class) ? $class : '' }} flex justify-between items-center bg-white">
    <div class="flex items-center gap-4">
        @isset($isSubPage)
            <a href="{{ url()->previous() }}"><i class="fa-solid fa-angle-left"></i></a>
        @endisset
        <span class="block text-xl font-semibold">{{ $title }}</span>
    </div>
    <div class="flex items-center gap-2">
        <span class="block px-2 py-1 border rounded">Admin</span>
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-1 bg-red-500 text-white border border-red-700 rounded hover:shadow shadow-gray-400/40">Keluar</button>
        </form>
    </div>
</section>