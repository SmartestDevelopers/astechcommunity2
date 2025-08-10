<?php

namespace App\Http\Controllers;

use App\Course;
use App\Service;
use App\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function buyCourse(Request $request, Course $course)
    {
        return view('checkout.course', compact('course'));
    }

    public function buyService(Request $request, Service $service)
    {
        return view('checkout.service', compact('service'));
    }

    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:course,service',
            'id' => 'required|integer',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'nullable|string|max:50',
            // Debit card inputs (simulated processing)
            'card_number' => 'required|digits_between:13,19',
            'card_name' => 'required|string|max:255',
            'card_exp_month' => 'required|integer|min:1|max:12',
            'card_exp_year' => 'required|integer|min:' . date('Y') . '|max:' . (date('Y') + 15),
            'card_cvc' => 'required|digits_between:3,4',
        ]);

        $purchasable = $validated['type'] === 'course'
            ? Course::findOrFail($validated['id'])
            : Service::findOrFail($validated['id']);

        // Simulated debit card processing
        $cardNumber = preg_replace('/\D/', '', $validated['card_number']);
        $cardLast4 = substr($cardNumber, -4);
        $cardBrand = $this->detectCardBrand($cardNumber);

        $order = Order::create([
            'user_id' => auth()->id(),
            'purchasable_type' => get_class($purchasable),
            'purchasable_id' => $purchasable->id,
            'amount' => method_exists($purchasable, 'getFinalPriceAttribute') ? $purchasable->final_price : ($purchasable->price ?? 0),
            'currency' => 'USD',
            'status' => 'paid',
            'payment_method' => 'debit_card',
            'card_last4' => $cardLast4,
            'card_brand' => $cardBrand,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'] ?? null,
        ]);

        return view('checkout.success', compact('order', 'purchasable'));
    }

    private function detectCardBrand(string $digits): string
    {
        // Very basic brand detection
        if (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $digits)) {
            return 'Visa';
        }
        if (preg_match('/^(5[1-5][0-9]{14})$/', $digits)) {
            return 'Mastercard';
        }
        if (preg_match('/^3[47][0-9]{13}$/', $digits)) {
            return 'Amex';
        }
        if (preg_match('/^6(?:011|5[0-9]{2})[0-9]{12}$/', $digits)) {
            return 'Discover';
        }
        return 'Card';
    }
}


