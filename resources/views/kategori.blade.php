    @extends('layouts.app')
    @section('title', 'Kategori')

    @section('content')
        @if ($errors->any())
        <div id="alert" class="bg-red-300 border border-red-300 text-red-dark px-12 py-3 rounded fixed top-0 right-0 m-4 z-50" role="alert">
            <strong class="font-bold">Gagal!</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
            <span class="absolute top-0 right-0 px-1 py-3" onclick="tutup()">
                <svg
                    class="fill-current h-6 w-6 text-red cursor-pointer"
                    role="button"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </span>
        </div>
        @endif

        <div class="p-4">
            <!-- Judul -->
            <h2 class="text-lg text-center font-bold text-gray-700 mb-2">Daftar Kategori</h2>



            <!-- Modal Dialog tambah data -->
            <div id="dataModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 id="modalTitle" class="text-lg font-bold text-gray-700">Tambah Data</h2>
                    <button class="text-gray-400 hover:text-gray-600" onclick="document.getElementById('dataModal').classList.add('hidden'); document.getElementById('daftar-kategori').classList.remove('hidden')">
                    ✖
                    </button>
                </div>

                <!-- Form -->
                <form id="tambah" action="/kategori-tambah" method="POST">
                    @csrf
                    <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="nama_kategori">Nama Kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan nama kategori" required>
                    </div>

                    <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="ukuran">Ukuran</label>
                    <input type="number" id="ukuran" name="ukuran" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan ukuran" required>
                    </div>

                    <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="satuan">Nama Satuan</label>
                    <input type="text" id="satuan" name="satuan" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan satuan" required>
                    </div>

                    <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="biaya_sales">Biaya Sales</label>
                    <input type="number" id="biaya_sales" name="biaya_sales" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan biaya sales" required>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-2">
                    <button type="button" class="mx-2 px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded hover:bg-gray-300" onclick="document.getElementById('dataModal').classList.add('hidden'); document.getElementById('daftar-kategori').classList.remove('hidden')">
                        Batal
                    </button>
                    <button type="submit" class="mx-2 px-4 py-2 text-sm text-white bg-green-500 rounded hover:bg-green-600">
                        Simpan
                    </button>
                    </div>
                </form>
                </div>
            </div>

            <!-- Modal Dialog edit data -->
            <div id="dataModaledit" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 id="modalTitle" class="text-lg font-bold text-gray-700">Edit Data</h2>
                    <button
                    class="text-gray-400 hover:text-gray-600"
                    onclick="document.getElementById('dataModaledit').classList.add('hidden'); document.getElementById('daftar-kategori').classList.remove('hidden')">
                    ✖
                    </button>
                </div>

                <!-- Form -->
                <form id="edit" action="/kategori-edit" method="POST">
                    @csrf
                    <input type="hidden" name="id_edit" id="id_edit" required>
                    <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="nama_kategori_edit">Nama Kategori</label>
                    <input type="text" id="nama_kategori_edit" name="nama_kategori_edit" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan nama kategori" required>
                    </div>

                    <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="ukuran_edit">Ukuran</label>
                    <input type="number" id="ukuran_edit" name="ukuran_edit" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Masukkan ukuran" required>
                    </div>

                    <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="satuan_edit">Satuan</label>
                    <input type="text" id="satuan_edit" name="satuan_edit" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Masukkan satuan" required>
                    </div>

                    <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="biaya_sales_edit">Biaya Sales</label>
                    <input type="number" id="biaya_sales_edit" name="biaya_sales_edit" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Masukkan biaya sales" required>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-2">
                    <button type="button" class="mx-2 px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded hover:bg-gray-300" onclick="document.getElementById('dataModaledit').classList.add('hidden'); document.getElementById('daftar-kategori').classList.remove('hidden')">
                        Batal
                    </button>
                    <button type="submit" class="mx-2 px-4 py-2 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600">
                        Perbarui
                    </button>
                    </div>
                </form>
                </div>
            </div>

            <!-- Modal Dialog hapus data -->
            <div id="dataModalHapus" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
                <!-- Header -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 id="modalTitle" class="text-lg font-bold text-gray-700">Hapus Data</h2>
                        <button
                        class="text-gray-400 hover:text-gray-600"
                        onclick="document.getElementById('dataModalHapus').classList.add('hidden'); document.getElementById('daftar-kategori').classList.remove('hidden')">
                        ✖
                        </button>
                    </div>

                <h1>Apakah anda yakin ingin menghapus data ini?</h1>

                <!-- Form -->
                <form id="dataModalHapus" action="/kategori-hapus" method="POST">
                    @csrf
                    <div class="mb-4">
                        <input type="hidden" id="id_hapus" name="id_hapus" required>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-2">
                        <button type="button" class="mx-2 px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded hover:bg-gray-300" onclick="document.getElementById('dataModalHapus').classList.add('hidden'); document.getElementById('daftar-kategori').classList.remove('hidden');">
                            Batal
                        </button>
                        <button type="submit" class="mx-2 px-4 py-2 text-sm text-white bg-red-500 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>

            <!-- Tabel -->
            <div class="flex flex-col mx-12">
                <!-- Button Tambah -->
                <!-- Button untuk membuka dialog -->
                <div class="flex justify-left my-4 mx-4">
                    <button
                    class="px-4 py-2 text-sm text-white bg-green-500 rounded hover:bg-green-600"
                    onclick="document.getElementById('dataModal').classList.remove('hidden'); document.getElementById('daftar-kategori').classList.add('hidden')">
                    Tambah Data
                    </button>
                </div>

                <table class="w-full bg-white border border-gray-200" id="daftar-kategori">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200">
                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">No</th>
                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Nama Kategori</th>
                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Ukuran</th>
                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Satuan</th>
                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Biaya Sales</th>
                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    @foreach ($kategori as $item)
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center text-sm text-gray-700">{{ $index }}</td>
                        <td class="px-4 py-2 text-center text-sm text-gray-700">{{ $item->nama_kategori}}</td>
                        <td class="px-4 py-2 text-center text-sm text-gray-700">{{ $item->ukuran}}</td>
                        <td class="px-4 py-2 text-center text-sm text-gray-700">{{ $item->satuan}}</td>
                        <td class="px-4 py-2 text-center text-sm text-gray-700">{{ $item->biaya_sales}}</td>
                        <td class="px-4 py-2 text-center text-sm text-gray-700">
                        <button onclick="edit('{{ $item->id }}','{{ $item->nama_kategori }}','{{ $item->ukuran }}','{{ $item->satuan }}','{{ $item->biaya_sales }}')" class="px-3 py-1 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600">Edit</button>
                        <button onclick="hapus({{ $item->id }})" class="px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600">Hapus</button>
                        </td>
                    </tr>
                    <?php $index++; ?>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const table = new simpleDatatables.DataTable("#daftar-kategori");
            });

            function edit(id,nama_kategori,ukuran,satuan,biaya_sales) {
                document.getElementById('daftar-kategori').classList.add('hidden')
                document.getElementById('dataModaledit').classList.remove('hidden')
                document.getElementById('id_edit').value = id
                document.getElementById('nama_kategori_edit').value = nama_kategori
                document.getElementById('ukuran_edit').value = ukuran
                document.getElementById('satuan_edit').value = satuan
                document.getElementById('biaya_sales_edit').value = biaya_sales
            }

            function hapus(id) {
                document.getElementById('daftar-kategori').classList.add('hidden')
                document.getElementById('dataModalHapus').classList.remove('hidden')
                document.getElementById('id_hapus').value = id
            }

            function tutup() {
                pesan = document.getElementById("alert");
                pesan.style.display = "none";
            }
        </script>
    @endsection
