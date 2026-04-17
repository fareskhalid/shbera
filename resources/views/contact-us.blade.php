@extends('layouts.app')
@section('title', __('site.contact'))

@section('content')
{{-- PAGE HERO --}}
<section class="page-hero" style="margin-top: 72px;">
    <div class="about-hero-content">
        <h1>{{ __('site.contact') }}</h1>
        <p class="breadcrumb">
            <a href="{{ route('home') }}">{{ __('site.home') }}</a>
            <span>/</span>
            <span>{{ __('site.contact') }}</span>
        </p>
    </div>
</section>

{{-- CONTACT SECTION --}}
<section style="padding: 5rem 2rem; background: var(--white);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div class="section-header" style="text-align: center; margin-bottom: 3rem;">
            <span class="section-tag">{{ __('site.contact') }}</span>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--navy); margin-top: 0.5rem;">{{ __('site.contact_heading') }}</h2>
            <p style="color: var(--gray); margin-top: 1rem; font-size: 1.05rem;">{{ __('site.contact_subheading') }}</p>
        </div>

        {{-- SUCCESS/ERROR MESSAGES --}}
        @if($message = session('success'))
            <div style="background: #d4f0e0; color: #1a7a45; padding: 1rem; border-radius: 6px; margin-bottom: 2rem; border-left: 4px solid #1a7a45;">
                {{ $message }}
            </div>
        @endif

        @if($message = session('error'))
            <div style="background: #fde8e8; color: #b91c1c; padding: 1rem; border-radius: 6px; margin-bottom: 2rem; border-left: 4px solid #b91c1c;">
                {{ $message }}
            </div>
        @endif

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;">
            {{-- CONTACT INFO --}}
            <div>
                <div style="background: var(--light); padding: 2rem; border-radius: 8px; margin-bottom: 2rem;">
                    <h3 style="color: var(--navy); font-size: 1.2rem; font-weight: 700; margin-bottom: 1.5rem;">{{ __('site.contact_info') }}</h3>
                    
                    <div style="display: flex; gap: 1rem; margin-bottom: 1.5rem; align-items: flex-start;" class="rtl-flex">
                        <i class="bi bi-geo-alt" style="color: var(--gold); font-size: 1.5rem; flex-shrink: 0; margin-top: 0.2rem;"></i>
                        <div>
                            <h4 style="color: var(--navy); font-weight: 600; margin-bottom: 0.3rem;">{{ __('site.address') }}</h4>
                            <p style="color: var(--gray); font-size: .9rem; line-height: 1.6;">{{ __('site.cairo_egypt') }}</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 1rem; margin-bottom: 1.5rem; align-items: flex-start;" class="rtl-flex">
                        <i class="bi bi-telephone" style="color: var(--gold); font-size: 1.5rem; flex-shrink: 0; margin-top: 0.2rem;"></i>
                        <div>
                            <h4 style="color: var(--navy); font-weight: 600; margin-bottom: 0.3rem;">{{ __('site.phone') }}</h4>
                            <p style="color: var(--gray); font-size: .9rem;">+201152525064</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 1rem; align-items: flex-start;" class="rtl-flex">
                        <i class="bi bi-envelope" style="color: var(--gold); font-size: 1.5rem; flex-shrink: 0; margin-top: 0.2rem;"></i>
                        <div>
                            <h4 style="color: var(--navy); font-weight: 600; margin-bottom: 0.3rem;">{{ __('site.email') }}</h4>
                            <p style="color: var(--gray); font-size: .9rem;"><a href="mailto:info@shbera.com" style="color: var(--gold); text-decoration: none;">info@shbera.com</a></p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CONTACT FORM --}}
            <div style="background: var(--light); padding: 2rem; border-radius: 8px;">
                <form method="POST" action="{{ route('contact.send') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
                    @csrf

                    <div>
                        <label style="display: block; color: var(--navy); font-weight: 600; margin-bottom: 0.5rem; font-size: .9rem;">{{ __('site.form_name') }}</label>
                        <input type="text" name="name" required placeholder="{{ __('site.form_name_placeholder') }}" value="{{ old('name') }}" style="width: 100%; border: 1.5px solid {{ $errors->has('name') ? '#b91c1c' : '#dde1e7' }}; border-radius: 4px; padding: 0.75rem 1rem; font-size: .9rem; font-family: inherit; outline: none; transition: border .2s;" onfocus="this.style.borderColor='var(--gold)';" onblur="this.style.borderColor='{{ $errors->has('name') ? '#b91c1c' : '#dde1e7' }}';">
                        @error('name')
                            <span style="color: #b91c1c; font-size: 0.85rem; display: block; margin-top: 0.3rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label style="display: block; color: var(--navy); font-weight: 600; margin-bottom: 0.5rem; font-size: .9rem;">{{ __('site.form_email') }}</label>
                        <input type="email" name="email" required placeholder="{{ __('site.form_email_placeholder') }}" value="{{ old('email') }}" style="width: 100%; border: 1.5px solid {{ $errors->has('email') ? '#b91c1c' : '#dde1e7' }}; border-radius: 4px; padding: 0.75rem 1rem; font-size: .9rem; font-family: inherit; outline: none; transition: border .2s;" onfocus="this.style.borderColor='var(--gold)';" onblur="this.style.borderColor='{{ $errors->has('email') ? '#b91c1c' : '#dde1e7' }}';">
                        @error('email')
                            <span style="color: #b91c1c; font-size: 0.85rem; display: block; margin-top: 0.3rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label style="display: block; color: var(--navy); font-weight: 600; margin-bottom: 0.5rem; font-size: .9rem;">{{ __('site.form_phone') }}</label>
                        <input type="tel" name="phone" placeholder="{{ __('site.form_phone_placeholder') }}" value="{{ old('phone') }}" style="width: 100%; border: 1.5px solid {{ $errors->has('phone') ? '#b91c1c' : '#dde1e7' }}; border-radius: 4px; padding: 0.75rem 1rem; font-size: .9rem; font-family: inherit; outline: none; transition: border .2s;" onfocus="this.style.borderColor='var(--gold)';" onblur="this.style.borderColor='{{ $errors->has('phone') ? '#b91c1c' : '#dde1e7' }}';">
                        @error('phone')
                            <span style="color: #b91c1c; font-size: 0.85rem; display: block; margin-top: 0.3rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label style="display: block; color: var(--navy); font-weight: 600; margin-bottom: 0.5rem; font-size: .9rem;">{{ __('site.form_subject') }}</label>
                        <input type="text" name="subject" required placeholder="{{ __('site.form_subject_placeholder') }}" value="{{ old('subject') }}" style="width: 100%; border: 1.5px solid {{ $errors->has('subject') ? '#b91c1c' : '#dde1e7' }}; border-radius: 4px; padding: 0.75rem 1rem; font-size: .9rem; font-family: inherit; outline: none; transition: border .2s;" onfocus="this.style.borderColor='var(--gold)';" onblur="this.style.borderColor='{{ $errors->has('subject') ? '#b91c1c' : '#dde1e7' }}';">
                        @error('subject')
                            <span style="color: #b91c1c; font-size: 0.85rem; display: block; margin-top: 0.3rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label style="display: block; color: var(--navy); font-weight: 600; margin-bottom: 0.5rem; font-size: .9rem;">{{ __('site.form_message') }}</label>
                        <textarea name="message" required placeholder="{{ __('site.form_message_placeholder') }}" rows="5" style="width: 100%; border: 1.5px solid {{ $errors->has('message') ? '#b91c1c' : '#dde1e7' }}; border-radius: 4px; padding: 0.75rem 1rem; font-size: .9rem; font-family: inherit; outline: none; transition: border .2s; resize: vertical;" onfocus="this.style.borderColor='var(--gold)';" onblur="this.style.borderColor='{{ $errors->has('message') ? '#b91c1c' : '#dde1e7' }}';">{{ old('message') }}</textarea>
                        @error('message')
                            <span style="color: #b91c1c; font-size: 0.85rem; display: block; margin-top: 0.3rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" style="background: var(--gold); color: var(--navy); padding: 0.75rem 1.5rem; border: none; border-radius: 4px; font-size: .95rem; font-weight: 700; cursor: pointer; transition: all .2s;" onmouseover="this.style.background='var(--gold2)'; this.style.transform='translateY(-1px)';" onmouseout="this.style.background='var(--gold)'; this.style.transform='translateY(0)';">
                        {{ __('site.form_send') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    @media (max-width: 768px) {
        div[style*="grid-template-columns: 1fr 1fr"] {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endpush
