@extends('layouts.app')
@section('title', 'Profile')

<link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
  integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
  crossorigin="anonymous"
/>

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

<div class="container mx-auto w-full h-full flex flex-col lg:flex-row overflow-auto h-screen">
    <div class="w-full max-w-lg order-2 lg:order-1">
        <div class="leading-loose">
            <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" action="/profile-edit" method="POST">
            @csrf
            <p class="text-gray-800  text-center text-lg font-medium">Profil</p>
            <div class="">
                <label class="block text-sm text-black-00" for="nama"
                >Nama</label
                >
                <input
                class="w-full px-5 py-1 text-gray-900 bg-gray-200 rounded"
                id="nama"
                name="nama"
                type="text"
                required=""
                placeholder="Budi Tristanto"
                aria-label="Nama"
                value="{{$profile->nama}}"
                />
            </div>
            <div class="mt-2">
                <label class="block text-sm text-black-00" for="email"
                >Email</label
                >
                <input
                class="w-full px-5 py-1 text-gray-900 bg-gray-200 rounded"
                id="email"
                name="email"
                type="text"
                required=""
                placeholder="budi99@gmail.com"
                aria-label="Email"
                value="{{$profile->email}}"
                />
            </div>

            <div class="mt-2">
                <label class="block text-sm text-black-00" for="no_wa"
                >Nomor Whatsapp</label
                >
                <input
                id="no_wa"
                name="no_wa"
                class="w-full px-5 py-1 text-gray-900 bg-gray-200 rounded"
                type="tel"
                placeholder="08987xxxxxxx"
                pattern="^0\d{10,13}$"
                title="Nomor harus dimulai dengan 0 dan terdiri dari 10-13 digit angka."
                value="{{0 . $profile->no_wa}}"
                required
                />
            </div>
            
            <div class="mt-2">
              <label class="block text-sm text-black-00" for="jenis_kelamin">Jenis Kelamin</label>
              <select id="jenis_kelamin" name="jenis_kelamin" class="w-full px-5 py-1 text-gray-900 bg-gray-200 rounded" required>
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
              </select>
            </div>

            <script>
              document.getElementById('jenis_kelamin').value = '{{$profile->jenis_kelamin}}';
            </script>

            <div class="mt-2">
                <label class="block text-sm text-black-00" for="alamat"
                >Alamat</label
                >
                <input
                class="w-full px-2 py-6 text-gray-900 bg-gray-200 rounded"
                id="alamat"
                name="alamat"
                type="text"
                required=""
                placeholder="Alamat anda"
                aria-label="Alamat"
                value="{{$profile->alamat}}"
                />
            </div>

            <div class="mt-4">
                <button
                class="px-5 py-1 text-white font-light tracking-wider bg-blue-500 rounded"
                type="submit"
                >
                Perbarui
                </button>
            </div>
            </form>
        </div>
    </div>
    <div class="w-full max-w-lg order-1 lg:order-2">
        <div class="leading-loose">
            <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" action="/profile-sandi" method="POST">
            @csrf
            <p class="text-gray-800  text-center text-lg font-medium">Mengubah Kata Sandi</p>
            <div class="mt-2">
                <label class="block text-sm text-black-00" for="password"
                  >Kata Sandi Lama</label
                >
                <div class="flex bg-gray-200 rounded items-center">
                  <input
                    class="w-full px-5 py-1 text-gray-900 bg-gray-200 rounded"
                    id="sandilama"
                    name="sandilama"
                    type="password"
                    required
                    placeholder="*******"
                    aria-label="password"
                  />

                  <p class="mr-2" onclick="togglesandilama()" style="cursor: pointer">
                    <span
                      id="togglesandilama"
                      class="fas fa-eye text-blue-500"
                    ></span>
                  </p>
                </div>

                <div class="mt-2">
                    <label class="block text-sm text-black-00" for="password"
                      >Kata Sandi Baru</label
                    >
                    <div class="flex bg-gray-200 rounded items-center">
                      <input
                        class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                        id="sandibaru"
                        name="sandibaru"
                        type="password"
                        required=""
                        placeholder="*******"
                        aria-label="password"
                      />

                      <p class="mr-2" onclick="togglesandibaru()" style="cursor: pointer">
                        <span
                          id="togglesandibaru"
                          class="fas fa-eye text-blue-500"
                        ></span>
                      </p>
                </div>

                <div class="mt-2">
                  <label class="block text-sm text-black-00" for="password">Konfirmasi Kata Sandi</label>
                  <div class="flex bg-gray-200 rounded items-center">
                    <input
                      class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                      id="konfirmasisandi"
                      name="konfirmasisandi"
                      type="password"
                      required=""
                      placeholder="*******"
                      aria-label="password"
                    />

                    <p class="mr-2" onclick="togglekonfirmasisandi()" style="cursor: pointer">
                      <span
                        id="togglekonfirmasisandi"
                        class="fas fa-eye text-blue-500"
                      ></span>
                    </p>
                  </div>
                </div>

                <div class="mt-4">
                    <button
                    class="px-5 py-1 text-white font-light tracking-wider bg-blue-500 rounded"
                    type="submit"
                    >
                    Perbarui
                    </button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglesandilama() {
        const passwordInput = document.getElementById("sandilama");
        const togglesandilama = document.getElementById("sandilama");

        const type =
            passwordInput.getAttribute("type") === "password"
                ? "text"
                : "password";
            passwordInput.setAttribute("type", type);
            // Ubah ikon atau teks toggle
            if (type === "password") {
            togglesandilama.classList.remove("fa-eye");
            togglesandilama.classList.add("fa-eye-slash");
            } else {
            togglesandilama.classList.remove("fa-eye-slash");
            togglesandilama.classList.add("fa-eye");
            }

      }

      function togglesandibaru() {
        const passwordInput = document.getElementById("sandibaru");
        const togglesandibaru = document.getElementById("sandibaru");

        const type =
            passwordInput.getAttribute("type") === "password"
                ? "text"
                : "password";
            passwordInput.setAttribute("type", type);
            // Ubah ikon atau teks toggle
            if (type === "password") {
            togglesandibaru.classList.remove("fa-eye");
            togglesandibaru.classList.add("fa-eye-slash");
            } else {
            togglesandibaru.classList.remove("fa-eye-slash");
            togglesandibaru.classList.add("fa-eye");
            }

      }

      function togglekonfirmasisandi() {
        const passwordInput = document.getElementById("konfirmasisandi");
        const togglekonfirmasisandi = document.getElementById("konfirmasisandi");

        const type =
            passwordInput.getAttribute("type") === "password"
                ? "text"
                : "password";
            passwordInput.setAttribute("type", type);
            // Ubah ikon atau teks toggle
            if (type === "password") {
            togglekonfirmasisandi.classList.remove("fa-eye");
            togglekonfirmasisandi.classList.add("fa-eye-slash");
            } else {
            togglekonfirmasisandi.classList.remove("fa-eye-slash");
            togglekonfirmasisandi.classList.add("fa-eye");
            }

      }

    function tutup() {
    pesan = document.getElementById("alert");
    pesan.style.display = "none";
    }
</script>
@endsection
