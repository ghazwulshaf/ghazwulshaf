<Header class="flex justify-between items-center px-24 py-12">
    <a href="#" class="block text-2xl font-semibold">
        <span>Ghazwul Shaf</span>
    </a>

    <nav>
        <ul class="flex items-center gap-4 *:p-2 *:nav-item *:font-semibold">
            <a href="{{ route('homepage.home') }}" class="{{ request()->routeIs('homepage.home*') ? 'active' : '' }}"><li>Home</li></a>
            <a href="#"><li>About Me</li></a>
            <a href="{{ route('homepage.projects') }}" class="{{ request()->routeIs('homepage.projects*') ? 'active' : '' }}"><li>My Projects</li></a>
            <a href="#"><li>How to Connect with Me</li></a>
        </ul>
    </nav>
</Header>