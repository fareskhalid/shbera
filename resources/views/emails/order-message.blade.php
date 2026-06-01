<x-mail::message>
# {{ __('site.new_order_submission') }}

{{ __('site.order_form_received') }}

**{{ __('site.name') }}:** {{ $customerName }}

**{{ __('site.email') }}:** {{ $customerEmail }}

**{{ __('site.phone') }}:** {{ $customerPhone ?? __('site.not_provided') }}

**{{ __('site.company_name') }}:** {{ $company ?? __('site.not_provided') }}

---

## {{ __('site.order_details') }}

**{{ __('site.product') }}:** {{ $productName }}

**{{ __('site.quantity') }}:** {{ $quantity }}

@if($message)
**{{ __('site.special_requests') }}:**

{{ $message }}
@endif

---

{{ __('site.email_footer') }}
</x-mail::message>
