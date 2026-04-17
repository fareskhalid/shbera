@extends('layouts.app')
@section('title', __('site.about'))

@section('content')
{{-- PAGE HERO --}}
<section class="page-hero" style="margin-top: 72px;">
    <div class="about-hero-content">
        <h1>{{ __('site.about') }}</h1>
        <p class="breadcrumb">
            <a href="{{ route('home') }}">{{ __('site.home') }}</a>
            <span>/</span>
            <span>{{ __('site.about') }}</span>
        </p>
    </div>
</section>

{{-- ABOUT SECTION --}}
<section class="about-section" style="padding: 5rem 2rem; background: var(--white);">
    <div class="about-grid" style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
        <div class="about-content">
            <span class="section-tag">{{ __('site.company') }}</span>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--navy); margin-bottom: 1.5rem;">
                {{ __('site.about_heading') }}
            </h2>
            <p style="color: var(--gray); line-height: 1.8; margin-bottom: 1.5rem;">
                {{ __('site.about_intro_1') }}
            </p>
            <p style="color: var(--gray); line-height: 1.8; margin-bottom: 2rem;">
                {{ __('site.about_intro_2') }}
            </p>
        </div>
        <div class="about-visual">
            <div class="about-hex-grid" style="display: grid; grid-template-columns: repeat(2, 100px); gap: 1rem;">
                <div class="hex" style="width: 100px; height: 115px; background: var(--navy); clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);"></div>
                <div class="hex" style="width: 100px; height: 115px; background: var(--gold); clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%); margin-top: 3rem;"></div>
                <div class="hex" style="width: 100px; height: 115px; background: var(--navy3); clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);"></div>
            </div>
        </div>
    </div>
</section>

{{-- MISSION & VISION --}}
<section style="padding: 5rem 2rem; background: var(--light);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div class="section-header" style="text-align: center; margin-bottom: 3rem;">
            <span class="section-tag">{{ __('site.why_us') }}</span>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--navy); margin-top: 0.5rem;">{{ __('site.mission_vision') }}</h2>
        </div>
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 3rem;">
            <div style="background: var(--white); padding: 2rem; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,.06);">
                <h3 style="color: var(--navy); font-size: 1.3rem; font-weight: 700; margin-bottom: 1rem;">
                    <i class="bi bi-target" style="color: var(--gold); margin-inline-end: 0.5rem;"></i>
                    {{ __('site.mission') }}
                </h3>
                <p style="color: var(--gray); line-height: 1.8;">
                    {{ __('site.mission_desc') }}
                </p>
            </div>
            <div style="background: var(--white); padding: 2rem; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,.06);">
                <h3 style="color: var(--navy); font-size: 1.3rem; font-weight: 700; margin-bottom: 1rem;">
                    <i class="bi bi-star" style="color: var(--gold); margin-inline-end: 0.5rem;"></i>
                    {{ __('site.vision') }}
                </h3>
                <p style="color: var(--gray); line-height: 1.8;">
                    {{ __('site.vision_desc') }}
                </p>
            </div>
        </div>
    </div>
</section>

{{-- WHY CHOOSE US --}}
<section style="padding: 5rem 2rem; background: var(--white);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div class="section-header" style="text-align: center; margin-bottom: 3rem;">
            <span class="section-tag">{{ __('site.why_us') }}</span>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--navy); margin-top: 0.5rem;">{{ __('site.why_choose') }}</h2>
        </div>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
            <div style="text-align: center;">
                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, rgba(201,168,76,.2), rgba(201,168,76,.1)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="bi bi-award" style="font-size: 2rem; color: var(--gold);"></i>
                </div>
                <h3 style="color: var(--navy); font-weight: 700; margin-bottom: 0.5rem;">{{ __('site.quality') }}</h3>
                <p style="color: var(--gray); font-size: .9rem;">{{ __('site.quality_detail') }}</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, rgba(201,168,76,.2), rgba(201,168,76,.1)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="bi bi-globe2" style="font-size: 2rem; color: var(--gold);"></i>
                </div>
                <h3 style="color: var(--navy); font-weight: 700; margin-bottom: 0.5rem;">{{ __('site.global') }}</h3>
                <p style="color: var(--gray); font-size: .9rem;">{{ __('site.global_detail') }}</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, rgba(201,168,76,.2), rgba(201,168,76,.1)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="bi bi-shield-check" style="font-size: 2rem; color: var(--gold);"></i>
                </div>
                <h3 style="color: var(--navy); font-weight: 700; margin-bottom: 0.5rem;">{{ __('site.reliable') }}</h3>
                <p style="color: var(--gray); font-size: .9rem;">{{ __('site.reliable_detail') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section style="padding: 4rem 2rem; background: linear-gradient(135deg, var(--navy) 0%, var(--navy3) 60%, #1a3a6b 100%); color: var(--white); text-align: center;">
    <div style="max-width: 800px; margin: 0 auto;">
        <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 1rem;">{{ __('site.partner_ready') }}</h2>
        <p style="font-size: 1.05rem; margin-bottom: 2rem; color: rgba(255,255,255,.8);">
            {{ __('site.partner_text') }}
        </p>
        <a href="{{ route('contact') }}" class="btn-primary">{{ __('site.contact') }} →</a>
    </div>
</section>

@endsection

@push('styles')
<style>
    @media (max-width: 768px) {
        .about-grid {
            grid-template-columns: 1fr !important;
        }
        div[style*="grid-template-columns: repeat(2"]  {
            grid-template-columns: 1fr !important;
        }
        div[style*="grid-template-columns: repeat(3"]  {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endpush
