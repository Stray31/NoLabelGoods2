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
            No Label Goods
        </div>

        <!-- Right side: Nav Links -->
        <div class="flex space-x-6 text-sm">
            <a href="#" class="hover:underline">About</a>
            <a href="/signup" class="hover:underline">Sign Up</a>
            <a href="/login" class="hover:underline">Log In</a>
        </div>
    </div>

    <div class="rounded-md overflow-hidden mb-12">
        <img src="{{ asset('images/bbimg.jpeg') }}" alt="Image" class="w-full max-h-150 object-cover rounded-md">
    </div>

    <div class="w-[90%] mx-auto px-6 mb-24">
        <div>
            <h1 class="font-bold text-5xl mb-6">No Label Goods</h1>
        </div>
        <div>
            <p class="text-gray-500 mb-5">
                For all your <span class="line-through">drugs</span> candy needs.
            </p>
        </div>
        <div>
            <p class="mb-5">Welcome to No Label Goods, the most suspiciously sweet corner of the internet.</p>

            <p class="mb-5">Our mission is simple: to provide premium-grade, high-potency, totally questionable products
                that look
                like drugs but are actually candy. Every item is handcrafted in what may or may not be a lab (or a
                kitchen), using undocumented ingredients and zero FDA approvals. Our supply chain is murky, our
                packaging is untraceable, and our flavors are criminally
                addictive.</p>

            <p class="mb-5">We are absolutely not responsible for what happens after checkout.</p>
        </div>
    </div>

    <div class=" w-[90%] mx-auto px-6 mb-12">
        <p class="font-bold text-2xl">Contact Us</p>
    </div>

    <div class="border-t-2 border-t-gray-100 w-[90%] mx-auto mb-12">
        <div class="flex items-center justify-between px-6">
            <!-- Left side: texts stacked vertically + icons in one horizontal row below -->
            <div class="flex flex-col text-gray-700 space-y-4 mt-6">
                <span class="font-bold text-lg">No Label Goods</span>
                <span class="text-sm text-gray-500">@2024 No Label Goods All Rights Reserved.</span>

                <!-- Icons in one horizontal row -->
                <div class="flex space-x-6 text-xl text-gray-600 mt-4">
                    <a href="#" class="hover:text-blue-600 transition-colors">
                        <img src="/images/icons/fbicon.png" alt="Facebook"
                            class="w-6 h-6 hover:scale-110 transition-transform cursor-pointer">
                    </a>
                    <a href="#" class="hover:text-pink-500 transition-colors">
                        <img src="/images/icons/igicon.png" alt="Instagram"
                            class="w-6 h-6 hover:scale-110 transition-transform cursor-pointer">
                    </a>
                    <a href="#" class="hover:text-blue-700 transition-colors">
                        <img src="/images/icons/github.png" alt="LinkedIn"
                            class="w-6 h-6 hover:scale-110 transition-transform cursor-pointer">
                    </a>
                    <a href="#" class="hover:text-red-600 transition-colors">
                        <img src="/images/icons/yticon.png" alt="YouTube"
                            class="w-6 h-6 hover:scale-110 transition-transform cursor-pointer">
                    </a>
                </div>

            </div>

            <!-- Right side: links -->
            <nav class="flex space-x-6 text-sm text-gray-600">
                <a href="#" class="hover:underline">Terms</a>
                <a href="#" class="hover:underline">Privacy</a>
                <a href="#" class="hover:underline">Contact</a>
            </nav>
        </div>

    </div>

    @if (session('signup_success'))
    <!-- Success Modal -->
    <div id="signupSuccessModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center mx-auto w-80">
            <h2 class="text-xl font-semibold mb-4 text-green-600">Account Created Successfully!</h2>
            <p class="mb-6">Welcome to No Label Goods. You can now log in and start shopping.</p>
            <button onclick="closeSignupSuccessModal()"
                class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">OK</button>
        </div>
    </div>
    <script>
        function closeSignupSuccessModal() {
            document.getElementById('signupSuccessModal').style.display = 'none';
        }
    </script>
    @endif

</body>

</html>