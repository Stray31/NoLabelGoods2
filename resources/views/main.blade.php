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

        <img src="{{ asset('images/bbimg.jpeg') }}" alt="Image" class="w-full object-cover h-full">


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
                        No Label Goods
                    </h1>
                    <p class="text-white text-2xl mt-2">
                        For all your <span class="line-through">drugs</span> candy and miscellaneous needs.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class=" h-80 flex">
        <div class="w-1/2  flex flex-col justify-between px-8 py-6">
            <div class="text-lg font-semibold mb-4 ml-32 mt-12">
                <p><span class="line-through">Drugs</span> Edibles</p>
            </div>

            <div class="text-gray-700 mb-4 ml-32">
                <p>Need a little something to take off the edge?</p>
                <p>Come browse the edibles section.</p>
            </div>

            <button onclick="window.location.href='/edibles'"
                class="font-semibold cursor-pointer hover:underline bg-black text-white px-4 py-2 rounded w-fit ml-32 mb-12">
                Browse
            </button>
        </div>
        <div class="w-1/2  p-4 box-border flex items-center justify-center mr-12">
            <img src="{{ asset('images/bluemeth.jpg') }}" alt="Image"
                class="rounded-md object-cover w-full h-full max-h-100" />
        </div>
    </div>


    <div class="h-80 flex">

        <div class="w-1/2 p-4 box-border flex items-center justify-center ml-36">
            <img src="{{ asset('images/guns.webp') }}" alt="Image"
                class="rounded-md object-cover w-full h-full max-h-100" />
        </div>


        <div class="w-1/2 flex flex-col justify-between px-8 py-6">
            <div class="text-left font-semibold mb-4 ml-20 mt-12 ">
                <p><span class="line-through">Guns</span> Toys</p>
            </div>

            <div class="text-gray-700 mb-4 ml-20 text-left">
                <p>Plastic, spring loaded, and suspiciously</p>
                <p>realistic.</p>
            </div>

            <div class="text-left ml-20 mb-12">
                <button onclick="window.location.href='/toys'"
                    class="font-semibold cursor-pointer hover:underline bg-black text-white px-4 py-2 rounded w-fit">Browse</button>
            </div>
        </div>
    </div>

    <div class=" h-80 flex">
        <div class="w-1/2  flex flex-col justify-between px-8 py-6">
            <div class="text-lg font-semibold mb-4 ml-32 mt-12">
                <p><span class="line-through">Hitmen</span> Freelance Problem Solvers</p>

            </div>

            <div class="text-gray-700 mb-4 ml-32">
                <p>Here to solve problems. Permanently.</p>
                <p>Sponsored by the cartel.</p>
            </div>

            <button onclick="window.location.href='/problemsolvers'"
                class="font-semibold cursor-pointer hover:underline bg-black text-white px-4 py-2 rounded w-fit ml-32 mb-12">Browse</button>
        </div>
        <div class="w-1/2  p-4 box-border flex items-center justify-center mr-12">
            <img src="{{ asset('images/hitmen/lalo.jpg') }}" alt="Image"
                class="rounded-md object-cover w-full h-full max-h-120" />
        </div>
    </div>


    <div class="h-80 flex">

        <div class="w-1/2 p-4 box-border flex items-center justify-center ml-36">
            <img src="{{ asset('images/saulgoodman.jpg') }}" alt="Image"
                class="rounded-md object-cover w-full h-full max-h-120" />
        </div>


        <div class="w-1/2 flex flex-col justify-between px-8 py-6">
            <div class="text-left font-semibold mb-4 ml-20 mt-12 ">
                <p><span class="line-through">Lawyers</span> Legal Friends for Hire</p>
            </div>

            <div class="text-gray-700 mb-4 ml-20 text-left">
                <p>Don't hire a Criminal Lawyer, hire a CRIMINAL</p>
                <p>lawyer.</p>
            </div>

            <div class="text-left ml-20 mb-12">
                <button onclick="window.location.href='/legalfriends'"
                    class="font-semibold cursor-pointer hover:underline bg-black text-white px-4 py-2 rounded w-fit">Browse</button>
            </div>
        </div>
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
                <button type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 mr-2">Logout</button>
                <button type="button" onclick="closeLogoutModal()"
                    class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancel</button>
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