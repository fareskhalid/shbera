<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\OrderFormRequest;
use App\Mail\ContactMessage;
use App\Mail\OrderMessage;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::where('is_active', true)
            ->orderBy('sort_order')
            ->take(3)
            ->get();
        return view('home', compact('featuredProducts'));
    }

    public function products()
    {
        $products = Product::where('is_active', true)
            ->orderBy('sort_order')
            ->paginate(12);
        return view('products', compact('products'));
    }

    public function show(Product $product)
    {
        // Check if product is active
        if (!$product->is_active) {
            abort(404);
        }
        return view('products-show', compact('product'));
    }

    public function order(Product $product, OrderFormRequest $request)
    {
        // Check if product is active
        if (!$product->is_active) {
            abort(404);
        }

        $validated = $request->validated();

        try {
            // Send email to admin with order details
            Mail::to(config('mail.from.address'))
                ->send(new OrderMessage(
                    customerName: $validated['name'],
                    customerEmail: $validated['email'],
                    customerPhone: $validated['phone'] ?? '',
                    productName: $product->name,
                    quantity: $validated['quantity'],
                    company: $validated['company'] ?? '',
                    message: $validated['message'] ?? '',
                ));

            return redirect()
                ->route('products.show', $product->id)
                ->with('success', __('site.order_sent_success'));
        } catch (\Exception $e) {
            \Log::error('Order submission failed: ' . $e->getMessage());

            return redirect()
                ->route('products.show', $product->id)
                ->withInput()
                ->with('error', __('site.order_sent_error'));
        }
    }

    public function about()
    {
        return view('about-us');
    }

    public function contact()
    {
        return view('contact-us');
    }

    public function sendContactMessage(ContactFormRequest $request)
    {
        $validated = $request->validated();

        try {
            // Send email to admin
            Mail::to(config('mail.from.address'))
                ->send(new ContactMessage(
                    name: $validated['name'],
                    email: $validated['email'],
                    phone: $validated['phone'] ?? '',
                    messageSubject: $validated['subject'],
                    message: $validated['message'],
                ));

            return redirect()
                ->route('contact')
                ->with('success', __('site.message_sent_success'));
        } catch (\Exception $e) {
            \Log::error('Contact form submission failed: ' . $e->getMessage());

            return redirect()
                ->route('contact')
                ->withInput()
                ->with('error', __('site.message_sent_error'));
        }
    }

    public function setLocale(Request $request, string $locale)
    {
        if (in_array($locale, ['ar', 'en'])) {
            session(['locale' => $locale]);
        }
        return redirect()->back();
    }
}
