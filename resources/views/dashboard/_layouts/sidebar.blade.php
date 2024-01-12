<section class="{{ isset($class) ? $class : '' }} h-full px-6 space-y-4">
    <a href="#" class="block pt-6 pb-4 border-b-2">
        <button class="block w-full py-3 border rounded text-2xl font-semibold shadow">Ghazwul Shaf</button>
    </a>
    <div>
        <ul class="flex flex-col gap-2 *:dash-item">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                <li><i class="fa-solid fa-house"></i> Dashboard</li></a>
            <a href="{{ route('admin.user') }}" class="{{ request()->routeIs('admin.user*') ? 'active' : '' }}">
                <li><i class="fa-solid fa-user"></i> User</li></a>
            <a href="#"><li><i class="fa-solid fa-users"></i> Team</li></a>
            <a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
                <li><i class="fa-solid fa-align-left"></i> Profile</li></a>
            <a href="{{ route('admin.portofolio') }}" class="{{ request()->routeIs('admin.portofolio*') ? 'active' : '' }}">
                <li><i class="fa-solid fa-image"></i> Portofolio</li></a>
            <a href="#"><li><i class="fa-solid fa-phone"></i> Contact</li></a>
            <a href="#"><li><i class="fa-solid fa-gear"></i> Settings</li></a>
        </ul>
    </div>
</section>