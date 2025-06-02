<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
</head>
<body>
<div class="w-[90%] mx-auto mt-12">
    <h2 class="text-2xl font-bold mb-4">Order #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</h2>
    <div class="mb-4">Status: <span class="font-semibold">{{ ucfirst($order->status) }}</span></div>
    <div class="mb-4">Placed: {{ $order->created_at->format('Y-m-d H:i') }}</div>
    <div class="mb-4">Delivery Address: {{ $order->delivery_address }}</div>
    <div class="mb-4">Contact Number: {{ $order->contact_number }}</div>
    <div class="mb-8">
        <h3 class="font-semibold mb-2">Items</h3>
        <table class="w-full text-left border-separate border-spacing-y-2">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>₱{{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="font-bold text-xl">Total: ₱{{ number_format($order->total, 2) }}</div>
</div>
</body>
</html>
