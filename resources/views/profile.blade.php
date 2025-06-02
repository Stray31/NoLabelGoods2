<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>No Label Goods | Profile</title>
</head>
<body>
    @php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user() ?? App\Models\User::first();
    @endphp
    <div class="w-[90%] mx-auto flex items-center justify-between py-6">
        <div class="text-lg font-semibold"><a href="/main"> No Label Goods</a> | Profile</div>
        <div class="flex space-x-6 text-sm">
            <a href="/profile" class="hover:underline">Profile</a>
            <a href="/cart" class="hover:underline">Cart</a>
            
            <button class="bg-black text-white px-4 py-1 rounded hover:bg-gray-800">Logout</button>
        </div>
    </div>
    <div class="w-[90%] mx-auto mt-8 grid grid-cols-3 gap-8">
        <div class="col-span-1 bg-black text-white rounded p-6 flex flex-col items-center justify-center h-full min-h-[320px]">
            
            <div class="text-xl font-bold mb-1">{{ $user->name }}</div>
            <div class="text-sm text-gray-300 mb-2">{{ $user->email }}</div>
            
            <div class="text-lg font-semibold mb-2">Balance: ₱{{ number_format($user->balance, 2) }}</div>
            <!-- Deposit Button triggers modal -->
            <button type="button" onclick="openDepositModal()" class="bg-green-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-600 transition w-full mb-2">Deposit</button>
            <!-- Deposit Modal -->
            <div id="depositModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
                <div class="bg-gray-900 rounded-lg p-8 shadow-2xl w-80 flex flex-col items-center relative">
                    <button onclick="closeDepositModal()" class="absolute top-2 right-2 text-gray-400 hover:text-white text-2xl">&times;</button>
                    <h2 class="text-white text-xl font-bold mb-4">Deposit Balance</h2>
                    <form action="{{ route('balance.deposit') }}" method="POST" class="w-full flex flex-col items-center">
                        @csrf
                        <label for="deposit-amount" class="text-white text-sm mb-1 w-full text-left">Amount</label>
                        <input id="deposit-amount" type="text" name="amount" pattern="^\d+(\.\d{1,2})?$" inputmode="decimal" placeholder="Enter amount" class="rounded px-3 py-2 bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-green-400 mb-2 w-full" required autocomplete="off">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-600 transition w-full">Deposit</button>
                    </form>
                </div>
            </div>
            <script>
                function openDepositModal() {
                    document.getElementById('depositModal').classList.remove('hidden');
                }
                function closeDepositModal() {
                    document.getElementById('depositModal').classList.add('hidden');
                }
            </script>
            <!-- End Deposit Modal -->
            
        </div>
        <div class="col-span-2 flex flex-col space-y-8">
            <div class="bg-black text-white rounded p-6">
                <div class="font-semibold mb-2">Delivery Address</div>
                <div class="flex items-center justify-between">
                    <span>126, Mangas 1, Alfonso, South Luzon, Cavite, 4123</span>
                    <a href="#" class="text-gray-300 hover:underline">Change</a>
                </div>
            </div>
            <div class="bg-black text-white rounded p-6">
                <div class="font-semibold mb-2">Order History</div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-2">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Order #</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $orders = $user ? $user->orders()->orderByDesc('created_at')->get() : collect();
                            @endphp
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                <td>#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    @if($order->status === 'delivered')
                                        <span class="text-green-400">Delivered</span>
                                    @elseif($order->status === 'processing')
                                        <span class="text-yellow-400">Processing</span>
                                    @else
                                        <span class="text-gray-400">{{ ucfirst($order->status) }}</span>
                                    @endif
                                </td>
                                <td>₱{{ number_format($order->total, 2) }}</td>
                                <td><a href="{{ route('order.show', $order->id) }}" class="text-blue-300 hover:underline">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
</body>
</html>