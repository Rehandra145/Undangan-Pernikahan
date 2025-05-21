<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Pinyon+Script&display=swap"
    rel="stylesheet" />
</head>

@vite(['resources/css/app.css'])

<body class="overflow-hidden h-screen">
  <div class="relative h-screen w-screen flex items-center justify-center bg-black bg-opacity-50 bg-cover bg-center bg-fixed sm:bg-[url('{{ asset('storage/IMG_5090.JPG') }}')] bg-[url('{{ asset('storage/IMG_5125.JPG') }}')]">

    <!-- Semi-transparent overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

    <!-- Register container -->
    <div class="relative z-10 w-full max-w-md px-6 py-8 text-center text-white">
      <x-session></x-session>
      <h1 class="text-4xl font-bold mb-10 font-serif">REGISTER</h1>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name input -->
        <div class="text-left mb-6">
          <label for="nama" class="block text-sm font-medium mb-1">NAMA</label>
          <input type="text" id="nama" name="username"
            class="w-full bg-transparent border-b border-white focus:outline-none text-white pb-2" />
        </div>

        <!-- Email input -->
        <div class="text-left mb-6">
          <label for="email" class="block text-sm font-medium mb-1">EMAIL</label>
          <input type="email" id="email" name="email"
            class="w-full bg-transparent border-b border-white focus:outline-none text-white pb-2" />
        </div>

        <!-- Password input -->
        <div class="text-left mb-6">
          <label for="password" class="block text-sm font-medium mb-1">PASSWORD</label>
          <input type="password" id="password" name="password"
            class="w-full bg-transparent border-b border-white focus:outline-none text-white pb-2" />
        </div>

        <!-- Confirm password -->
        <div class="text-left mb-10">
          <label for="password_confirmation" class="block text-sm font-medium mb-1">KONFIRMASI PASSWORD</label>
          <input type="password" id="password_confirmation" name="password_confirmation"
            class="w-full bg-transparent border-b border-white focus:outline-none text-white pb-2" />
        </div>

        <button type="submit"
          class="border border-white rounded-full px-10 py-2 hover:bg-white hover:bg-opacity-20 transition-all">
          DAFTAR
        </button>
      </form>
    </div>
  </div>
</body>

</html>
