@extends('layouts.front')

@section('title', 'Client Dashboard - AS-Tech Community')

@section('content')
<div class="max-w-4xl mx-auto my-16 p-8 bg-white rounded-2xl shadow">
  <h1 class="text-2xl font-bold">Welcome to your Client Dashboard</h1>
  <p class="mt-2 text-gray-600">You're logged in as a client.</p>
  <div class="mt-6">
    <a href="{{ url('/') }}" class="inline-block px-4 py-2 rounded bg-gradient-to-r from-green-500 to-green-600 text-white">Go to Home</a>
  </div>
</div>
@endsection


