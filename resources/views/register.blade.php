<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="dist/styles.css">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
      integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous"
    />
    <style>
      .login {
        width: 100vw;
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
        background-image: url("./dist/images/login-baru.png");
      }
    </style>
    <title>Daftar</title>
  </head>
  <body class="h-screen font-sans login bg-cover">

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

    <div
      class="container mx-auto h-full flex flex-1 justify-center items-center"
    >
      <div class="w-full max-w-lg">
        <div class="leading-loose">
          <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" action="/register" method="POST">
            @csrf
            <p class="text-gray-800 font-medium text-center text-lg font-bold text-black-500">Daftar</p>
            <div class="">
              <label class="block text-sm text-black-00" for="nama"
                >Nama</label
              >
              <input
                class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                id="nama"
                name="nama"
                type="text"
                required=""
                placeholder="Budi Tristanto"
                aria-label="Nama"
              />
            </div>
            <div class="mt-2">
              <label class="block text-sm text-black-00" for="email"
                >Email</label
              >
              <input
                class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                id="email"
                name="email"
                type="text"
                required=""
                placeholder="budi99@gmail.com"
                aria-label="Email"
              />
            </div>

            <div class="mt-2">
              <label class="block text-sm text-black-00" for="password"
                >Kata Sandi</label
              >
              <div class="flex">
                <input
                  class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                  id="password"
                  name="password"
                  type="password"
                  required=""
                  placeholder="*******"
                  aria-label="password"
                />

                <p class="ml-2" onclick="togglePassword()" style="cursor: pointer">
                  <span
                    id="togglePassword"
                    class="fas fa-eye text-blue-500"
                  ></span>
                </p>
              </div>
            </div>

            <div class="mt-2">
              <label class="block text-sm text-black-00" for="no_wa"
                >Nomor Whatsapp</label
              >
              <input
                id="no_wa"
                name="no_wa"
                class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                type="tel"
                placeholder="08987xxxxxxx"
                pattern="^0\d{10,13}$"
                title="Nomor harus dimulai dengan 0 dan terdiri dari 10-13 digit angka."
                required
              />
            </div>
            <div class="mt-2">
              <label class="block text-sm text-black-00" for="jenis_kelamin"
                >Jenis Kelamin</label
              >
              <input type="radio" name="jenis_kelamin" value="Laki - Laki" /> laki-laki
              <input type="radio" name="jenis_kelamin" value="Perempuan" />perempuan
            </div>

            <div class="mt-2">
              <label class="block text-sm text-black-00" for="alamat"
                >Alamat</label
              >
              <input
                class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                id="alamat"
                name="alamat"
                type="text"
                required=""
                placeholder="Alamat anda"
                aria-label="Alamat"
              />
            </div>
            <div class="mt-4">
              <button
                class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded"
                type="submit"
              >
                Daftar
              </button>
            </div>
            <a
              class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800"
              href="login"
            >
             Sudah punya akun?
            </a>
          </form>
        </div>
      </div>
    </div>

    <script>
      function togglePassword() {
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");

        const type =
            passwordInput.getAttribute("type") === "password"
                ? "text"
                : "password";
            passwordInput.setAttribute("type", type);
            // Ubah ikon atau teks toggle
            if (type === "password") {
            togglePassword.classList.remove("fa-eye");
            togglePassword.classList.add("fa-eye-slash");
            } else {
            togglePassword.classList.remove("fa-eye-slash");
            togglePassword.classList.add("fa-eye");
            }

      }

      function tutup() {
        pesan = document.getElementById("alert");
        pesan.style.display = "none";
      }
    </script>
  </body>
</html>
