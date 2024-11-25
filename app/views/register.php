<!DOCTYPE html>
<html class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <link href="/css/tailwind.css" rel="stylesheet">
    <script src="/js/script.js"></script>
    <title>Register</title>
</head>

<body class="backdrop-blur-sm">
    <!-- Error Modal -->
    <?php if (isset($errors) && !empty($errors)): dump($errors);exit; ?>
        <div id="errorModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 max-w-sm w-full">
                <h2 class="text-lg font-bold text-red-600 dark:text-red-400 mb-4">Error</h2>
                <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-2">
                    <?php foreach ($errors as $error): ?>
                        <li class="flex items-center space-x-2">
                            <span class="text-red-500 font-bold">•</span>
                            <span><?= htmlspecialchars($error) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <button id="closeModal" class="mt-4 w-full bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg text-sm px-4 py-2">
                    Close
                </button>
            </div>
        </div>
        <?php unset($errors); ?>
    <?php endif; ?>

    <section class="bg-gray-50 dark:bg-gray-900 bg-[url('/assets/images/signup.png')]">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h2 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create an account
                    </h2>
                    <form class="space-y-4 md:space-y-6" method="post" action="/register">
                        <div class="flex space-x-4">
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="usernameExample" required>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your phone number</label>
                            <input type="tel" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-456-7890" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                            <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("closeModal")?.addEventListener("click", () => {
            document.getElementById("errorModal").classList.add("hidden");
        });
    </script>
</body>

</html>
