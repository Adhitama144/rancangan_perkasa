
<div class="flex flex-col md:h-screen">
    <!-- Navbar -->
    <header style ="width:100vw!important " class="w-full flex items-center justify-between bg-blue-500 gap-5 text-white px-4 py-2 md:hidden">
        <div class="text-lg font-bold">
            <img src="./dist/images/logo.jpeg" alt="Deskripsi Gambar" class="mr-3 inline w-20 h-10" />
        </div>
        <button id="menu-toggle" class="text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar" class="h-full hidden md:h-screen w-64 bg-blue-500 text-white md:block  top-0 left-5 z-5">
        <div class="p-4 text-lg font-bold">
            <img src="./dist/images/logo.jpeg" alt="Deskripsi Gambar" class="inline w-50 h-50" />
        </div>
        <nav class="mt-4">
            <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-700">Beranda</a>
            <a href="/kategori" class="block px-4 py-2 hover:bg-gray-700">Kategori</a>
            <a href="/barang" class="block px-4 py-2 hover:bg-gray-700">Barang</a>
            <a href="/biaya-pengiriman" class="block px-4 py-2 hover:bg-gray-700">Biaya Pengiriman</a>
            <a href="/management-akun" class="block px-4 py-2 hover:bg-gray-700">Management Akun</a>
            <a href="/profile" class="block px-4 py-2 hover:bg-gray-700">Profil</a>
            <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 hover:bg-gray-700">
                @csrf
                <button type="submit">Keluar</button>
            </form>
        </nav>
    </aside>
</div>

<script>
    // Toggle sidebar on small screens
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
    });
</script>

