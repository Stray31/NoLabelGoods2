<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="border-b-2 border-b-gray-100 h-20 w-[90%] mx-auto flex items-center justify-between px-6 mb-12">
        <!-- Left side: Logo -->
        <div class="text-xl font-semibold">
            <p>No Label Goods</p>
        </div>

        <!-- Right side: Nav Links -->
        <div class="flex space-x-6 text-sm">
            <a href="#" class="hover:underline">About</a>
            <a href="/signup" class="hover:underline">Sign Up</a>
            <a href="#" class="hover:underline">Log In</a>
            <!-- Replace the Logout link/button -->
            
            
        </div>
    </div>

    <div class="rounded-md overflow-hidden mb-12">
        <img src="{{ asset('images/bbimg.jpeg') }}" alt="Image" class="w-full max-h-150 object-cover rounded-md">

        <div
            class="absolute top-1/2 right-12 transform -translate-y-1/2 bg-white bg-opacity-90 p-8 rounded-xl shadow-lg w-120">
            <h2 class="text-2xl font-bold mb-6 text-center">Log In</h2>

            <form action="/login" method="POST">
                @csrf
                <!-- Email -->
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="loginemail"
                    class="w-full px-4 py-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter your email">

                <!-- Password -->
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="loginpassword"
                    class="w-full px-4 py-2 mb-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter your password">

                <!-- Show Password -->
                <div class="flex items-center mb-8 mt-4">
                    <input type="checkbox" id="show-password" class="mr-2">
                    <label for="show-password" class="text-sm text-gray-600">Show Password</label>
                </div>

                <!-- Submit -->
                <button
                    class="w-full bg-black hover:bg-gray-800 text-white font-semibold py-2 rounded-lg transition">
                    Log In
                </button>
            </form>
        </div>
    </div>

    <!-- Logout Modal -->
    <div id="logoutModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center mx-auto mt-40 w-80">
            <h2 class="text-xl font-semibold mb-4">Confirm Logout</h2>
            <p class="mb-6">Are you sure you want to logout?</p>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 mr-2">Logout</button>
                <button type="button" onclick="closeLogoutModal()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancel</button>
            </form>
        </div>
    </div>

    <div class="w-[90%] mx-auto px-6 mb-12 mt-32">
        <p class="font-bold text-2xl">Contact Us</p>
    </div>
    <div class="border-t-2 border-t-gray-100 w-[90%] mx-auto mb-12">
        <div class="flex items-center justify-between px-6">
            <div class="flex flex-col text-gray-700 space-y-4 mt-6">
                <span class="font-bold text-lg">No Label Goods</span>
                <span class="text-sm text-gray-500">@2024 No Label Goods All Rights Reserved.</span>
                <div class="flex space-x-6 text-xl text-gray-600 mt-4">
                    <a href="#" class="hover:text-blue-600 transition-colors">
                        <img src="/images/icons/fbicon.png" alt="Facebook" class="w-6 h-6 hover:scale-110 transition-transform cursor-pointer">
                    </a>
                    <a href="#" class="hover:text-pink-500 transition-colors">
                        <img src="/images/icons/igicon.png" alt="Instagram" class="w-6 h-6 hover:scale-110 transition-transform cursor-pointer">
                    </a>
                    <a href="#" class="hover:text-blue-700 transition-colors">
                        <img src="/images/icons/github.png" alt="LinkedIn" class="w-6 h-6 hover:scale-110 transition-transform cursor-pointer">
                    </a>
                    <a href="#" class="hover:text-red-600 transition-colors">
                        <img src="/images/icons/yticon.png" alt="YouTube" class="w-6 h-6 hover:scale-110 transition-transform cursor-pointer">
                    </a>
                </div>
            </div>
            <nav class="flex space-x-6 text-sm text-gray-600">
                <a href="#" class="hover:underline">Terms</a>
                <a href="#" class="hover:underline">Privacy</a>
                <a href="#" class="hover:underline">Contact</a>
            </nav>
        </div>
    </div>

    <script>
        document.getElementById('show-password').addEventListener('change', function () {
            const password = document.getElementById('password');
            password.type = this.checked ? 'text' : 'password';
        });

        function openLogoutModal() {
            var modal = document.getElementById('logoutModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        function closeLogoutModal() {
            var modal = document.getElementById('logoutModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>

</body>

</html>