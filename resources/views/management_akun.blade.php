@extends('layouts.app')
@section('title', 'Management Akun')

@section('content')
<div class="flex items-center justify-center">
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

        <div class="w-full h-full p-4">
            <!-- Judul -->
            <h2 class="text-lg text-center font-bold text-gray-700 mb-2">Daftar Management Akun</h2>

            <!-- Modal Dialog Detail data -->
            <div id="dataModaldetail" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 id="modalTitle" class="text-lg font-bold text-gray-700">Detail Akun</h2>
                    <button
                    class="text-gray-400 hover:text-gray-600"
                    onclick="document.getElementById('dataModaldetail').classList.add('hidden'); document.getElementById('daftar-kategori').classList.remove('hidden')">
                    ✖
                    </button>
                </div>

                <!-- Form -->
                <form id="detail" action="/management-akun-detail" method="POST">
                    @csrf
                    <input type="hidden" name="id_detail" id="id_detail" required>
                    <div class="flex justify-center">
                        <div class="kiri mr-4">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="nama_detail">Nama</label>
                                <input type="text" id="nama_detail" name="nama_detail" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan nama anda" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="jenis_kelamin_detail">Jenis Kelamin</label>
                                <select id="jenis_kelamin_detail" name="jenis_kelamin_detail" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="alamat_detail">Alamat</label>
                                <textarea type="text" id="alamat_detail" name="alamat_detail" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" cols="30" rows="4"
                                    placeholder="Masukkan alamat" required></textarea>
                            </div>
                        </div>
                        <div class="kanan">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="email_detail">Email</label>
                                <input type="text" id="email_detail" name="email_detail" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="Masukkan email" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="no_wa_detail">Nomor Whatapp</label>
                                <input type="number" id="no_wa_detail" name="no_wa_detail" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="Masukkan Nomor Whatapp" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="jenis_akun_detail">Jenis Akun</label>
                                <select id="jenis_akun_detail" name="jenis_akun_detail" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                                    <option value="kurir">Kurir</option>
                                    <option value="sales">Sales</option>
                                    <option value="umum">Umum</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-2">
                    <button type="button" class="mx-2 px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded hover:bg-gray-300" onclick="document.getElementById('dataModal').classList.add('hidden'); document.getElementById('daftar-kategori').classList.remove('hidden')">
                        Oke
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
                <form id="edit" action="/management-akun-edit" method="POST">
                    @csrf
                    <input type="hidden" name="id_edit" id="id_edit" required>
                    <div class="flex justify-center">
                        <div class="kiri mr-4">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="nama_edit">Nama</label>
                                <input type="text" id="nama_edit" name="nama_edit" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan nama anda" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="jenis_kelamin_edit">Jenis Kelamin</label>
                                <select id="jenis_kelamin_edit" name="jenis_kelamin_edit" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="alamat_edit">Alamat</label>
                                <textarea type="text" id="alamat_edit" name="alamat_edit" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" cols="30" rows="4"
                                    placeholder="Masukkan alamat" required></textarea>
                            </div>
                        </div>
                        <div class="kanan">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="email_edit">Email</label>
                                <input type="text" id="email_edit" name="email_edit" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="Masukkan email" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="no_wa_edit">Nomor Whatapp</label>
                                <input type="number" id="no_wa_edit" name="no_wa_edit" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="Masukkan Nomor Whatapp" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="jenis_akun_edit">Jenis Akun</label>
                                <select id="jenis_akun_edit" name="jenis_akun_edit" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                                    <option value="kurir">Kurir</option>
                                    <option value="sales">Sales</option>
                                    <option value="umum">Umum</option>
                                </select>
                            </div>
                        </div>
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

            <!-- Modal Dialog Ganti kata Sandi akun -->
            <div id="dataModalgantisandi" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
                <!-- Header -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 id="modalTitle" class="text-lg font-bold text-gray-700">Ganti Kata Sandi</h2>
                        <button
                        class="text-gray-400 hover:text-gray-600"
                        onclick="document.getElementById('dataModalgantisandi').classList.add('hidden'); document.getElementById('daftar-kategori').classList.remove('hidden')">
                        ✖
                        </button>
                    </div>

                <!-- Form -->
                <form id="dataModalgantisandi" action="/management-akun-ganti-sandi" method="POST">
                    @csrf
                    <div class="mb-4">
                        <input type="hidden" id="id_ganti_sandi" name="id_ganti_sandi" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="sandi">Ganti Kata Sandi</label>
                        <input type="text" id="sandi" name="sandi" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Masukkan Kata Sandi Baru" required>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-2">
                        <button type="button" class="mx-2 px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded hover:bg-gray-300" onclick="document.getElementById('dataModalgantisandi').classList.add('hidden'); document.getElementById('daftar-kategori').classList.remove('hidden');">
                            Batal
                        </button>
                        <button type="submit" class="mx-2 px-4 py-2 text-sm text-white bg-red-500 rounded hover:bg-red-600">
                            Ganti Kata Sandi
                        </button>
                    </div>
                </form>
            </div>
        </div>

            <!-- Tabel -->
            <div class="flex flex-col w-full md:mx-12">
            <table class="w-full bg-white border border-gray-200" id="daftar-kategori">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-200">
                <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">No</th>
                <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Nama</th>
                <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Jenis Kelamin</th>
                <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Jenis Akun</th>
                <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $index = 1; ?>
                @foreach ($akun as $item)
                    <tr class="border-b">
                        <td class="px-4 py-2 text-center text-sm text-gray-700">{{ $index }}</td>
                        <td class="px-4 py-2 text-center text-sm text-gray-700">{{ $item->nama}}</td>
                        <td class="px-4 py-2 text-center text-sm text-gray-700">{{ $item->jenis_kelamin}}</td>
                        <td class="px-4 py-2 text-center text-sm text-gray-700">{{ $item->jenis_akun_id}}</td>
                        <td class="px-4 py-2 text-center text-sm text-gray-700">
                            <button onclick="detail('{{ $item->id }}','{{ $item->nama }}','{{ $item->email }}','{{ $item->no_wa}}','{{ $item->jenis_kelamin}}','{{ $item->alamat}}','{{ $item->jenis_akun_id}}')" class="px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600">Detail</button>
                            <button onclick="edit('{{ $item->id }}','{{ $item->nama }}','{{ $item->email }}','{{ $item->no_wa}}','{{ $item->jenis_kelamin}}','{{ $item->alamat}}','{{ $item->jenis_akun_id}}')" class="px-3 py-1 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600">Edit</button>
                            <button onclick="password('{{ $item->id }}')" class="px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600">Ganti Sandi</button>
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

        function detail(id,nama,email,no_wa,jenis_kelamin,alamat,jenis_akun_id) {
            document.getElementById('daftar-kategori').classList.add('hidden')
            document.getElementById('dataModaldetail').classList.remove('hidden')

            document.getElementById('id_detail').value = id
            document.getElementById('nama_detail').value = nama
            document.getElementById('email_detail').value = email
            document.getElementById('no_wa_detail').value = no_wa
            document.getElementById('jenis_kelamin_detail').value = jenis_kelamin
            document.getElementById('alamat_detail').value = alamat
            document.getElementById('jenis_akun_detail').value = jenis_akun_id
        }

        function edit(id,nama,email,no_wa,jenis_kelamin,alamat,jenis_akun_id) {
            document.getElementById('daftar-kategori').classList.add('hidden')
            document.getElementById('dataModaledit').classList.remove('hidden')

            document.getElementById('id_edit').value = id
            document.getElementById('nama_edit').value = nama
            document.getElementById('email_edit').value = email
            document.getElementById('no_wa_edit').value = no_wa
            document.getElementById('jenis_kelamin_edit').value = jenis_kelamin
            document.getElementById('alamat_edit').value = alamat
            document.getElementById('jenis_akun_edit').value = jenis_akun_id
        }

        function password(id) {
            document.getElementById('daftar-kategori').classList.add('hidden')
            document.getElementById('dataModalgantisandi').classList.remove('hidden')
            document.getElementById('id_ganti_sandi').value = id
        }

        function tutup() {
            pesan = document.getElementById("alert");
            pesan.style.display = "none";
        }
    </script>
@endsection
