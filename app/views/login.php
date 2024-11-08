<!DOCTYPE html>
<html class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <link href="/css/tailwind.css" rel="stylesheet">
    <script src="/js/script.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="bg-[#1A2932] flex justify-center items-center h-screen">
        <!-- Left: Image -->
        <div class="w-1/2 h-screen hidden lg:block">
            <img src="/assets/images/home-bg.png" alt="Placeholder Image" class="object-cover w-full h-full">
        </div>

        <!-- Right: Login Form -->
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4 text-white">Login</h1>
            <form action="/login" method="POST" id="loginForm" novalidate>
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-600">Email</label>
                    <input type="text" id="email" name="email" autocomplete="email" required class="w-full bg-[#121212] border border-gray-300 rounded-md py-2 px-3 focus:outline-none  text-white focus:border-blue-500">
                    <p class="text-xs mt-1 text-red-500" id="emailError"></p>
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Password</label>
                    <input type="password" id="password" name="password" autocomplete="current-password" required class="w-full bg-[#121212] border text-white border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    <p class="text-xs mt-1 text-red-500" id="passwordError"></p>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="mb-4 flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="text-primary">
                    <label for="remember" class="ml-2 text-primary">Remember Me</label>
                </div>

                <!-- Forgot Password Link -->
                <div class="mb-6 text-blue-500">
                    <a href="#" class="hover:underline">Forgot Password?</a>
                </div>

                <!-- Login Button -->
                <button type="submit" class="bg-red-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">
                    Login
                </button>
            </form>

            <!-- Sign up Link -->
            <div class="mt-6 text-[#B0B3B8] text-center">
                <p>Not a member? <a href="#" class="hover:underline">Start a 14-day free trial</a></p>
            </div>
        </div>
    </div>
</body>

</html>