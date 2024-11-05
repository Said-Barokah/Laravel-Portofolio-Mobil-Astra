<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
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
            <h1 class="text-2xl font-bold mb-3 text-[#444B59]">Buat Akun</h1>
            <form method="POST" action="{{ route('login.post') }}">
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-600 mr-4 mb-2">Nama Lengkap</label>
                    <input type="text" id="username" name="username"
                        class="w-full border border-[#A2001D] rounded-full py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-600 mr-4 mb-2">Alamat</label>
                    <input type="text" id="alamat" name="alamat"
                        class="w-full border border-[#A2001D] rounded-full py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>
                <div class="mb-4">
                    <label for="telphone" class="block text-gray-600 mr-4 mb-2">No Telepon</label>
                    <input type="text" id="telphone" name="telphone"
                        class="w-full border border-[#A2001D] rounded-full py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 mr-4 mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full border border-[#A2001D] rounded-full py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-600 mb-2">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-[#A2001D] rounded-full py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
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
                <button type="submit"
                    class="bg-[#A2001D] hover:bg-[#510513] text-white font-semibold rounded-full py-2 px-4 w-full">Buat Akun</button>
            </form>
            <!-- Sign up  Link -->
            {{-- <div class="mt-6 text-blue-500 text-center">
        <a href="#" class="hover:underline">Sign up Here</a>
      </div> --}}
        </div>
    </div>
</body>

</html>
