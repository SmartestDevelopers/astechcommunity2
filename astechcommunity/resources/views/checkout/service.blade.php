@extends('layouts.front')

@section('title', 'Buy Service - ' . $service->title)

@section('content')
<div class="max-w-3xl mx-auto my-12 p-8 bg-white rounded-2xl shadow">
  <h1 class="text-2xl font-bold mb-4">Checkout - Service</h1>
  <div class="mb-6">
    <div class="font-semibold">{{ $service->title }}</div>
    <div class="text-sm text-gray-600">Price: <span class="font-semibold">${{ number_format($service->price ?? 0, 2) }}</span></div>
  </div>
  <form method="POST" action="{{ route('checkout.order') }}" class="space-y-4">
    @csrf
    <input type="hidden" name="type" value="service">
    <input type="hidden" name="id" value="{{ $service->id }}">
    <div>
      <label class="block text-sm">Full Name</label>
      <input class="w-full border rounded px-3 py-2" name="customer_name" required>
    </div>
    <div>
      <label class="block text-sm">Email</label>
      <input class="w-full border rounded px-3 py-2" name="customer_email" type="email" required>
    </div>
    <div>
      <label class="block text-sm">Phone</label>
      <input class="w-full border rounded px-3 py-2" name="customer_phone" type="text">
    </div>
    <hr class="my-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label class="block text-sm">Card Number</label>
        <input class="w-full border rounded px-3 py-2" name="card_number" inputmode="numeric" autocomplete="cc-number" placeholder="4242 4242 4242 4242" required>
      </div>
      <div>
        <label class="block text-sm">Name on Card</label>
        <input class="w-full border rounded px-3 py-2" name="card_name" required>
      </div>
      <div>
        <label class="block text-sm">Expiry Month</label>
        <input class="w-full border rounded px-3 py-2" name="card_exp_month" type="number" min="1" max="12" required>
      </div>
      <div>
        <label class="block text-sm">Expiry Year</label>
        <input class="w-full border rounded px-3 py-2" name="card_exp_year" type="number" min="{{ date('Y') }}" max="{{ date('Y') + 15 }}" required>
      </div>
      <div>
        <label class="block text-sm">CVC</label>
        <input class="w-full border rounded px-3 py-2" name="card_cvc" type="password" inputmode="numeric" maxlength="4" required>
      </div>
    </div>
    <button class="px-4 py-2 rounded bg-gradient-to-r from-green-500 to-green-600 text-white">Place Order</button>
  </form>
</div>
@endsection


