<x-mail::message>
# {{ __('site.new_contact_submission') }}

{{ __('site.contact_form_received') }}

**{{ __('site.name') }}:** {{ $contactName }}

**{{ __('site.email') }}:** {{ $contactEmail }}

**{{ __('site.phone') }}:** {{ $contactPhone ?? __('site.not_provided') }}

**{{ __('site.subject') }}:** {{ $contactSubject }}

---

## {{ __('site.message') }}

{{ $contactMessage }}

---

{{ __('site.email_footer') }}
</x-mail::message>
