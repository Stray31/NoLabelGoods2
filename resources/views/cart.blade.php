<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>No Label Goods | My Cart</title>
</head>
<body>
    <div class="w-[90%] mx-auto flex items-center justify-between py-6">
        <div class="text-lg font-semibold"><a href="/main"> No Label Goods</a> | My Cart</div>
        <div class="flex space-x-6 text-sm">
            <a href="/profile" class="hover:underline">Profile</a>
            <a href="/cart" class="hover:underline">Cart</a>
            
            <button class="bg-black text-white px-4 py-1 rounded hover:bg-gray-800">Logout</button>
        </div>
    </div>
    <div class="w-[90%] mx-auto">
        <form id="cart-form" action="/checkout" method="GET">
            <table class="w-full text-left border-separate border-spacing-y-4">
                <thead>
                    <tr class="bg-black text-white">
                        <th class="py-2 px-4"><input type="checkbox" id="select-all"></th>
                        <th class="py-2 px-4">Product</th>
                        <th class="py-2 px-4">Unit Price</th>
                        <th class="py-2 px-4">Quantity</th>
                        <th class="py-2 px-4">Total Price</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                @php
                // For demo: use session or static array. Replace with real session/cart logic as needed.
                $cart = session('cart', [
                    ['product_id' => 1, 'quantity' => 1],
                    ['product_id' => 2, 'quantity' => 2],
                ]);
                $products = \App\Models\Product::whereIn('id', collect($cart)->pluck('product_id'))->get()->keyBy('id');
                $total = 0;
                @endphp
                <tbody>
                    @forelse($cart as $key => $item)
                        @php
                            $product = $products[$item['product_id']] ?? null;
                            if (!$product) continue;
                            $subtotal = $product->price * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr class="bg-black text-white">
                            <td class="py-2 px-4 align-top">
                                <input type="checkbox" name="selected[]" value="{{ $item['product_id'] }}" class="cart-checkbox">
                            </td>
                            <td class="py-2 px-4 align-top">
                                <div class="flex items-center space-x-4">
                                    <img src="/images/{{ $product->image }}" class="w-16 h-16 rounded object-cover" />
                                    <p>{!! $product->name !!}</p>
                                </div>
                            </td>
                            <td class="py-2 px-4 align-top">₱{{ number_format($product->price, 2) }}</td>
                            <td class="py-2 px-4 align-top">{{ $item['quantity'] }}</td>
                            <td class="py-2 px-4 align-top">₱{{ number_format($subtotal, 2) }}</td>
                            <td class="py-2 px-4 align-top">
                                <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST" style="display:inline">
                                    @csrf
                                    <button type="submit" class="text-red-400 hover:underline">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">Your cart is empty.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="w-[90%] mx-auto flex justify-end mt-8">
                <button type="submit" class="bg-black text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-800 transition">Checkout</button>
            </div>
        </form>
    </div>
    <div class="w-[90%] mx-auto mt-16">
        <p class="font-bold text-2xl mb-6">Contact Us</p>
        <div class="border-t-2 border-t-gray-100 pt-6 flex items-start justify-between">
            <div>
                <span class="font-bold text-lg block mb-2">No Label Goods</span>
                <span class="text-sm text-gray-500 block mb-2">@2024 No Label Goods All Rights Reserved.</span>
                <div class="flex space-x-4 text-xl text-gray-600 mt-2">
                    <a href="#" class="hover:text-blue-600 transition-colors"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-pink-500 transition-colors"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-blue-700 transition-colors"><i class="fab fa-github"></i></a>
                    <a href="#" class="hover:text-red-600 transition-colors"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="flex flex-col items-end space-y-2">
                <div class="flex space-x-8 text-sm text-gray-600">
                    <a href="#" class="hover:underline">Terms</a>
                    <a href="#" class="hover:underline">Privacy</a>
                    <a href="#" class="hover:underline">Contact</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('select-all').onclick = function() {
            document.querySelectorAll('.cart-checkbox').forEach(cb => cb.checked = this.checked);
        };
    </script>
</body>
</html>