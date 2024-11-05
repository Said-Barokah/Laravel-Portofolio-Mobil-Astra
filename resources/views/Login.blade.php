<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body>
    <div class="bg-gray-100 flex justify-center items-center h-screen">
        <!-- Left: Image -->
    <div class="w-1/2 h-screen hidden lg:block bg-[#A2001D]">
    <div class="flex justify-center items-center h-full flex-col">
        <img src="/images/Mobil-Login.png" alt="Placeholder Image" class="object-cover w-20%">
        <p class="text-white font-bold">
            Premium cars.
        </p>
        <p class="text-white font-bold"> Enjoy the luxury</p>
    </div>

    </div>
    <!-- Right: Login Form -->
    <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
      <h1 class="text-2xl font-bold mb-3 text-[#444B59]">Masuk</h1>
      <div  class="flex items-center mb-12">
        <p class="text-sm mr-2">Belum punya akun,</p> <a class="text-[#A2001D]" href="/Daftar">Daftar</a>
      </div>

      <form method="POST" action="{{ route('login.post') }}">
        <!-- Username Input -->
        @csrf
        <div class="mb-4">
          <label for="email" class="block text-gray-600 mr-4 mb-2">Email</label>
          <input type="email" id="email" name="email" class="w-full border border-[#A2001D] rounded-full py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
        </div>
        <!-- Password Input -->
        <div class="mb-4">
          <label for="password" class="block text-gray-600 mb-2">Password</label>
          <input type="password" id="password" name="password" class="w-full border border-[#A2001D] rounded-full py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
        </div>
        <!-- Remember Me Checkbox -->
        {{-- <div class="mb-4 flex items-center"> --}}
          {{-- <input type="checkbox" id="remember" name="remember" class="text-blue-500"> --}}
          {{-- <label for="remember" class="text-gray-600 ml-2">Remember Me</label> --}}
        {{-- </div> --}}
        <!-- Forgot Password Link -->
        {{-- <div class="mb-6 text-blue-500">
          <a href="#" class="hover:underline">Forgot Password?</a>
        </div> --}}
        <!-- Login Button -->
        <button type="submit" name=="web" class="bg-[#A2001D] hover:bg-[#510513] text-white font-semibold rounded-full py-2 px-4 w-full">Login</button>
        <button type="submit" name="admin" value="1" class="mt-5 bg-[#053a51] hover:bg-[#054951] text-white font-semibold rounded-full py-2 px-4 w-full">Login as Admin</button>

    </form>
      <!-- Sign up  Link -->
      {{-- <div class="mt-6 text-blue-500 text-center">
        <a href="#" class="hover:underline">Sign up Here</a>
      </div> --}}
    </div>
    </div>
</body>
</html>
