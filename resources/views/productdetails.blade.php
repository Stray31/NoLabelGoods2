<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
</head>
<body>
    @php
    $productId = request('id', 1);
    @endphp
    <div class="relative w-full h-[400px]">
        <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" class="w-full object-cover h-full">
        <div class="absolute top-0 left-0 w-full h-full bg-black/30 flex flex-col">
            <div class="w-[90%] mx-auto flex items-center justify-between px-6 py-4 text-white">
                <div class="text-xl font-semibold"><a href="/main" class="hover:underline">No Label Goods</a></div>
                <div class="flex space-x-6 text-sm">
                    <a href="/profile" class="hover:underline">Profile</a>
                    <a href="/cart" class="hover:underline">Cart</a>
                    
                    <a href="#" onclick="openLogoutModal()" class="hover:underline">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-[90%] mx-auto mt-12 gap-12">
        <div class="w-[400px] h-[400px] border-2 border-blue-500 rounded-md overflow-hidden flex-shrink-0">
            <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" class="w-full h-full object-cover" />
        </div>
        <div class="flex-1 flex flex-col justify-start">
            <h2 class="text-2xl font-bold mb-2">{!! $product->name !!}</h2>
            <div class="text-lg font-semibold mb-2">₱{{ number_format($product->price, 2) }}</div>
            <div class="text-gray-700 mb-4 max-w-lg">{{ $product->description }}</div>
            <div class="flex items-center mb-6">
                <span class="mr-4 font-medium">Quantity:</span>
                <button id="decrement" class="w-8 h-8 bg-gray-200 rounded text-lg font-bold flex items-center justify-center">-</button>
                <input id="quantity" type="text" value="1" class="w-12 text-center mx-2 border rounded" readonly />
                <button id="increment" class="w-8 h-8 bg-gray-200 rounded text-lg font-bold flex items-center justify-center">+</button>
            </div>
            <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input id="cart-quantity" type="hidden" name="quantity" value="1">
                <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 ml-2">Add to Cart</button>
            </form>
            <!-- Add to Cart Confirmation Modal -->
            <div id="cartModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
                <div class="bg-white rounded-lg shadow-lg p-8 text-center mx-auto w-80">
                    <h2 class="text-xl font-semibold mb-4">Added to Cart!</h2>
                    <p class="mb-6">{!! $product->name !!} has been added to your cart.</p>
                    <button onclick="closeCartModal()" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">OK</button>
                </div>
            </div>
        </div>
    </div>
    <div class="w-[90%] mx-auto mt-12">
        <h3 class="font-semibold text-lg mb-4">Related products</h3>
        <div class="grid grid-cols-4 gap-6">
            @foreach($related as $rel)
            <div>
                <a href="/productdetails?id={{ $rel->id }}">
                    <img src="{{ asset('images/' . $rel->image) }}" class="rounded-md w-full h-32 object-cover mb-2 cursor-pointer hover:scale-105 transition-transform" />
                </a>
                <div class="font-semibold text-sm">{!! $rel->name !!}</div>
                <div class="text-gray-500 text-xs">{{ $rel->description }}</div>
                <div class="text-black text-xs font-bold mt-1">₱{{ number_format($rel->price, 2) }}</div>
            </div>
            @endforeach
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
        const quantityInput = document.getElementById('quantity');
        // Update hidden input for cart quantity on + or -
        const cartQuantityInput = document.querySelector('input[name="quantity"]');
        quantityInput.addEventListener('change', function() {
            cartQuantityInput.value = quantityInput.value;
        });
        document.getElementById('increment').onclick = function() {
            let val = parseInt(quantityInput.value);
            if (val < 99) quantityInput.value = val + 1;
            cartQuantityInput.value = quantityInput.value;
        };
        document.getElementById('decrement').onclick = function() {
            let val = parseInt(quantityInput.value);
            if (val > 1) quantityInput.value = val - 1;
            cartQuantityInput.value = quantityInput.value;
        };

        document.getElementById('add-to-cart-form').onsubmit = function(e) {
            e.preventDefault();
            const form = this;
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('[name=_token]').value,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(new FormData(form))
            })
            .then(response => {
                if (response.ok) {
                    document.getElementById('cartModal').classList.remove('hidden');
                } else {
                    alert('Failed to add to cart.');
                }
            });
        };
        function closeCartModal() {
            document.getElementById('cartModal').classList.add('hidden');
        }

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