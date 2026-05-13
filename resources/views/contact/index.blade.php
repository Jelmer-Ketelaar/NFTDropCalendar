@extends('layouts.app')

@section('content')

    <div class="contact-page">

        {{-- Page Header --}}
        <div class="page-title">
            <div class="container">
                <div class="page-title-content">
                    <h1>Get in Touch</h1>
                    <p style="color: var(--nft-text-secondary); margin-top: 0.5rem;">Have a question or want to list your drop? We'd love to hear from you.</p>
                </div>
            </div>
        </div>

        <div class="section-padding">
            <div class="container">
                <div class="row g-5 justify-content-center">

                    {{-- Contact Info Column --}}
                    <div class="col-lg-4 col-md-12">
                        <div class="contact-info">
                            <h3 style="margin-bottom: 1.5rem;">Contact Info</h3>

                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <h6>Email Us</h6>
                                    <p>hello@nftdropcalendar.com</p>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fab fa-twitter" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <h6>Twitter / X</h6>
                                    <p><a href="https://twitter.com/DropCalendarNFT" target="_blank" rel="noopener noreferrer">@DropCalendarNFT</a></p>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-clock" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <h6>Response Time</h6>
                                    <p>Usually within 24–48 hours</p>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-list-check" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <h6>Want to list a drop?</h6>
                                    <p><a href="{{ route('drops.create') }}">Submit it here</a> — it's quick and easy.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Contact Form Column --}}
                    <div class="col-lg-7 col-md-12">

                        @if(session('success'))
                            <div class="alert alert-success mb-4" role="alert">
                                <i class="fas fa-check-circle me-2" aria-hidden="true"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger mb-4" role="alert">
                                <i class="fas fa-exclamation-circle me-2" aria-hidden="true"></i>
                                <ul class="mb-0 ps-3">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="contact-form-card">
                            <h3 style="margin-bottom: 0.5rem;">Send a Message</h3>
                            <p style="color: var(--nft-text-secondary); margin-bottom: 2rem; font-size: 0.95rem;">Fill out the form below and we'll get back to you as soon as possible.</p>

                            <form method="POST" action="{{ route('contact.send') }}" novalidate>
                                @csrf

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Your Name <span aria-hidden="true" style="color: var(--nft-red);">*</span></label>
                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="John Doe"
                                            value="{{ old('name') }}"
                                            required
                                            autocomplete="name"
                                        >
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address <span aria-hidden="true" style="color: var(--nft-red);">*</span></label>
                                        <input
                                            type="email"
                                            name="email"
                                            id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="you@example.com"
                                            value="{{ old('email') }}"
                                            required
                                            autocomplete="email"
                                        >
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="subject" class="form-label">Subject <span aria-hidden="true" style="color: var(--nft-red);">*</span></label>
                                        <input
                                            type="text"
                                            name="subject"
                                            id="subject"
                                            class="form-control @error('subject') is-invalid @enderror"
                                            placeholder="What's this about?"
                                            value="{{ old('subject') }}"
                                            required
                                        >
                                        @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="message" class="form-label">Message <span aria-hidden="true" style="color: var(--nft-red);">*</span></label>
                                        <textarea
                                            name="message"
                                            id="message"
                                            class="form-control @error('message') is-invalid @enderror"
                                            rows="6"
                                            placeholder="Tell us how we can help..."
                                            required
                                        >{{ old('message') }}</textarea>
                                        @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" style="min-width: 160px;">
                                            <i class="fas fa-paper-plane me-2" aria-hidden="true"></i>
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @push('head')
        <style>
            .contact-info-item {
                display: flex;
                align-items: flex-start;
                gap: 1rem;
                padding: 1.25rem;
                background: var(--nft-card);
                border: 1px solid var(--nft-border);
                border-radius: var(--nft-radius-lg);
                margin-bottom: 1rem;
                transition: border-color var(--nft-transition-base);
            }

            .contact-info-item:hover {
                border-color: var(--nft-accent);
            }

            .contact-info-icon {
                width: 42px;
                height: 42px;
                border-radius: var(--nft-radius-md);
                background: rgba(34, 211, 238, 0.1);
                border: 1px solid rgba(34, 211, 238, 0.2);
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--nft-accent);
                font-size: 1rem;
                flex-shrink: 0;
            }

            .contact-info-item h6 {
                color: var(--nft-text) !important;
                font-size: 0.875rem !important;
                font-weight: 600 !important;
                margin-bottom: 0.25rem !important;
            }

            .contact-info-item p {
                color: var(--nft-text-secondary) !important;
                font-size: 0.875rem !important;
                margin: 0 !important;
                line-height: 1.5 !important;
            }

            .contact-form-card {
                background: var(--nft-card);
                border: 1px solid var(--nft-border);
                border-radius: var(--nft-radius-xl);
                padding: 2.5rem;
            }

            @media (max-width: 576px) {
                .contact-form-card {
                    padding: 1.5rem;
                }
            }
        </style>
    @endpush

@endsection
