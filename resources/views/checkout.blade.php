<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>No Label Goods | Checkout</title>
</head>
<body>
    @php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user() ?? App\Models\User::first();
    $selected = request('selected', []);
    $cart = session('cart', []);
    // Get all product IDs in the cart
    $productIds = collect($cart)->pluck('product_id')->all();
    // Fetch all products from the database
    $products = \App\Models\Product::whereIn('id', $productIds)->get()->keyBy('id');
    // Build checkout items with full product info and quantity
    $checkoutItems = collect($selected)->map(function($id) use ($cart, $products) {
        $cartItem = collect($cart)->firstWhere('product_id', $id);
        $product = $products[$id] ?? null;
        if ($product && $cartItem) {
            return array_merge($product->toArray(), ['quantity' => $cartItem['quantity']]);
        }
        return null;
    })->filter();
    $total = $checkoutItems->sum(function($item) {
        return $item['price'] * $item['quantity'];
    });
    @endphp
    <form method="POST" action="{{ route('checkout.store') }}" id="checkout-form">
        @csrf
        <input type="hidden" name="delivery_address" value="Janluke Pamular (+63 960 203 5375) 126, Mangas 1, Alfonso, South Luzon, Cavite, 4123">
        <input type="hidden" name="contact_number" value="+63 960 203 5375">
        <input type="hidden" name="cart" value="{{ json_encode($cart) }}">
        <input type="hidden" name="selected" value="{{ json_encode($selected) }}">
        <div class="w-[90%] mx-auto flex items-center justify-between py-6">
            <div class="text-lg font-semibold">No Label Goods | Checkout</div>
            <div class="flex space-x-6 text-sm">
                <a href="/profile" class="hover:underline">Profile</a>
                <a href="/cart" class="hover:underline">Cart</a>
                <a href="/wishlist" class="hover:underline">Wishlist</a>
                <button class="bg-black text-white px-4 py-1 rounded hover:bg-gray-800">Logout</button>
            </div>
        </div>
        <div class="w-[90%] mx-auto mb-8">
            <div class="bg-black text-white rounded p-4 mb-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="font-semibold">Delivery Address</span>
                    <a href="#" class="text-gray-300 hover:underline">Change</a>
                </div>
                <div>Janluke Pamular (+63 960 203 5375) 126, Mangas 1, Alfonso, South Luzon, Cavite, 4123</div>
            </div>
            <div class="bg-black text-white rounded p-4 mb-6">
                <div class="font-semibold mb-2">Products Ordered</div>
                <table class="w-full text-left border-separate border-spacing-y-4 mb-4">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($checkoutItems as $item)
                            <tr>
                                <td class="align-top">
                                    <img src="/images/{{ $item['image'] }}" class="w-16 h-16 rounded object-cover" />
                                </td>
                                <td class="align-top">
                                    <div class="font-semibold">{!! $item['name'] !!}</div>
                                    <div class="text-xs text-gray-400">{{ ucfirst($item['category']) }}</div>
                                </td>
                                <td class="align-top">{{ $item['quantity'] }}</td>
                                <td class="align-top">₱{{ number_format($item['price'], 2) }}</td>
                                <td class="align-top">₱{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                <td class="align-top"></td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center">No items selected for checkout.</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="flex items-center justify-between border-t border-gray-700 pt-2">
                    <div>
                        <span>Shipping Details: Standard Local</span>
                        <a href="#" class="ml-2 text-gray-300 hover:underline">Change</a>
                    </div>
                    <div>₱40.00</div>
                </div>
                <div class="flex items-center justify-between mt-2">
                    <span>Estimated Arrival Date: Within 2 ~ 3 days</span>
                    <span>Order Total: <span class="font-semibold">₱{{ number_format($total, 2) }}</span></span>
                </div>
            </div>
            <div class="bg-black text-white rounded p-4 mb-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="font-semibold">Payment Method</span>
                    <span>GCash</span>
                    <a href="#" class="text-gray-300 hover:underline">Change</a>
                </div>
                <div class="border-t border-gray-700 my-2"></div>
                <div class="flex flex-col items-end">
                    <div class="flex justify-between w-full max-w-xs mb-1">
                        <span>Merchandise Subtotal</span>
                        <span>₱{{ number_format($total, 2) }}</span>
                    </div>
                    <div class="flex justify-between w-full max-w-xs mb-1">
                        <span>Shipping Subtotal</span>
                        <span>₱40.00</span>
                    </div>
                    <div class="flex justify-between w-full max-w-xs mb-1">
                        <span class="text-green-600 font-semibold">Your Balance</span>
                        <span class="text-green-600 font-semibold">₱{{ number_format($user->balance, 2) }}</span>
                    </div>
                    <div class="flex justify-between w-full max-w-xs font-semibold">
                        <span>Total Payment</span>
                        <span>₱{{ number_format($total + 40, 2) }}</span>
                    </div>
                    <div class="w-[90%] mx-auto flex justify-end mt-8">
                        <button type="submit" class="bg-black text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-800 transition">Place Order</button>
                    </div>
                </div>
            </div>
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
        <div id="insufficientModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-8 text-center mx-auto w-80">
                <h2 class="text-xl font-semibold mb-4">Insufficient Balance</h2>
                <p class="mb-6">Your balance is not enough to complete this order.</p>
                <button type="button" onclick="closeInsufficientModal()" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">OK</button>
            </div>
        </div>
        <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-8 text-center mx-auto w-80">
                <h2 class="text-xl font-semibold mb-4">Order Successful</h2>
                <p class="mb-6">Your order has been placed successfully! Our people will be in touch.</p>
                <button type="button" onclick="closeSuccessModal()" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">OK</button>
            </div>
        </div>
    </form>
    <script>
        document.getElementById('checkout-form').onsubmit = function(e) {
            e.preventDefault();
            // Get values as numbers, fallback to 0 if NaN
            const total = parseFloat("{{ $total + 40 }}");
            const userBalance = parseFloat("{{ $user->balance }}");
            console.log('userBalance:', userBalance, 'total:', total, typeof userBalance, typeof total);
            if (userBalance < total) {
                document.getElementById('insufficientModal').classList.remove('hidden');
                return false;
            }
            document.getElementById('successModal').classList.remove('hidden');
            // Do NOT submit the form yet; wait for user to click OK
            // Submission will be handled in closeSuccessModal
        };
        function closeInsufficientModal() {
            document.getElementById('insufficientModal').classList.add('hidden');
        }
        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
            // Actually submit the form after user clicks OK
            document.getElementById('checkout-form').submit();
            // Optionally, redirect to another page after order success
            // window.location.href = '/profile';
        }
    </script>
</body>
</html>