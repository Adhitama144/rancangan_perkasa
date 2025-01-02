
    <!-- Sidebar -->
    <aside class="h-screen w-64 bg-gray-800 text-white">
        <div class="p-4 text-lg font-bold">My Sidebar</div>
        <nav class="mt-4">
            <a href="#" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-700">Kategori</a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-700">Profile</a>
            <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 hover:bg-gray-700">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
    </aside>
