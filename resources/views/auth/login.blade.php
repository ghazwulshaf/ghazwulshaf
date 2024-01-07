@extends('app')

@section('children')
<section class="w-full h-screen bg-gradient-to-br from-primary to-secondary">
    <div class="w-96 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-24 py-12 backdrop-blur bg-white/10 text-white shadow shadow-gray-900/20 rounded space-y-6">
        <span class="block text-xl font-semibold uppercase text-center">Login</span>
        <div class="flex flex-col gap-4">
            <div class="space-y-2">
                <span class="block font-semibold">Username</span>
                <input type="text" name="username" id="username" class="w-full px-2 py-1 text-sm rounded">
            </div>
            <div class="space-y-2">
                <span class="block font-semibold">Password</span>
                <input type="password" name="password" id="password" class="w-full px-2 py-1 text-sm rounded">
            </div>
            <button type="submit" class="mt-4 py-2 bg-primary text-white font-semibold rounded">Login</button>
        </div>
    </div>
</section>
@endsection