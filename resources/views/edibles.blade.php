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
    <div class="relative w-full  h-[600px]">

        <img src="{{ asset('images/bluemeth.jpg') }}" alt="Image" class="w-full object-cover h-full">


        <div class="absolute top-0 left-0 w-full h-full bg-black/30 flex flex-col">

            <div class="w-[90%] mx-auto flex items-center justify-between px-6 py-4 text-white">

                <div class="text-xl font-semibold"><a href="/main" class="hover:underline">No Label Goods</a></div>


                <div class="flex space-x-6 text-sm">
                    <a href="/profile" class="hover:underline">Profile</a>
                    <a href="/cart" class="hover:underline">Cart</a>
                    
                    <a href="#" onclick="openLogoutModal()" class="hover:underline">Logout</a>
                </div>
            </div>


            <div class="flex-grow flex items-center justify-center px-6 pb-15">
                <div class="text-center">
                    <h1 class="text-white text-4xl font-bold">
                        <span class="line-through">Drugs</span> Edibles
                    </h1>
                    <p class="text-white text-2xl mt-2">
                        Need a little something to take off the edge? Come browse the edibles section.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-[90%] mx-auto mt-12 grid grid-cols-3 gap-8">
        @foreach($products as $product)
            @if($product->category === 'edibles')
            <div>
                <a href="/productdetails?id={{ $product->id }}">
                    <img src="{{ asset('images/' . $product->image) }}" class="rounded-md w-full h-48 object-cover mb-2 cursor-pointer hover:scale-105 transition-transform" />
                </a>
                <div class="font-semibold text-sm">{!! $product->name !!}</div>
                <div class="text-gray-500 text-xs">₱{{ number_format($product->price, 2) }}</div>
            </div>
            @endif
        @endforeach
    </div>

    <div class=" w-[90%] mx-auto px-6 mb-12 mt-32">
        <p class="font-bold text-2xl">Contact Us</p>
    </div>

    <div class="border-t-2 border-t-gray-100 w-[90%] mx-auto mb-12">
        <div class="flex items-center justify-between px-6">

            <div class="flex flex-col text-gray-700 space-y-4 mt-6">
                <span class="font-bold text-lg">No Label Goods</span>
                <span class="text-sm text-gray-500">@2024 No Label Goods All Rights Reserved.</span>


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
    <script>
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