@extends('layouts.front')

@section('title', 'Order Successful')

@section('content')
<div class="max-w-3xl mx-auto my-12 p-8 bg-white rounded-2xl shadow text-center">
  <h1 class="text-2xl font-bold mb-2">Thank you! Your order has been placed.</h1>
  <p class="text-gray-600 mb-6">Order #{{ $order->id }} | Status: {{ ucfirst($order->status) }}</p>
  <div class="mb-6">
    <div>Item: <strong>{{ class_basename($order->purchasable_type) }}</strong></div>
    <div class="text-gray-700 mt-1">Amount: <strong>${{ number_format($order->amount, 2) }}</strong></div>
  </div>
  <a href="{{ url('/') }}" class="px-4 py-2 rounded bg-gradient-to-r from-purple-500 to-purple-600 text-white">Back to Home</a>
</div>
@endsection


