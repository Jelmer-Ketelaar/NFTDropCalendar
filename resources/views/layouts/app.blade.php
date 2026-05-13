<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $pageTitle ?? 'Home' }} | NFTDropCalendar</title>

    {{-- Primary SEO Meta Tags --}}
    <meta name="title" content="{{ $seoTitle ?? 'NFTDropCalendar - Discover Upcoming NFT Drops' }}">
    <meta name="description"
          content="{{ $seoDescription ?? 'Discover the latest NFT drops and release dates on our comprehensive NFT calendar. Stay updated with upcoming NFT collections, drops, and auctions in one place.' }}">
    <meta name="keywords"
          content="NFT, NFT drops, NFT calendar, NFT release dates, NFT collections, Web3, blockchain, crypto art">
    <meta name="author" content="NFTDropCalendar">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $seoTitle ?? 'NFTDropCalendar - Discover Upcoming NFT Drops' }}">
    <meta property="og:description"
          content="{{ $seoDescription ?? 'Discover the latest NFT drops and release dates on our comprehensive NFT calendar.' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('logo.png') }}">
    <meta property="og:site_name" content="NFTDropCalendar">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $seoTitle ?? 'NFTDropCalendar - Discover Upcoming NFT Drops' }}">
    <meta name="twitter:description"
          content="{{ $seoDescription ?? 'Discover the latest NFT drops and release dates on our comprehensive NFT calendar.' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? asset('logo.png') }}">
    <meta name="twitter:site" content="@DropCalendarNFT">

    {{-- Theme color and favicon --}}
    <meta name="theme-color" content="#050816">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">

    {{-- Performance: preconnect to external resources --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://use.fontawesome.com">

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nft-premium.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    {{-- Schema.org structured data --}}
    <script type="application/ld+json">
        {
        "@@context": "https://schema.org",
        "@@type": "WebSite",
        "name": "NFTDropCalendar",
        "url": "{{ url('/') }}",
        "description": "Discover upcoming NFT drops and release dates",
        "potentialAction": {
            "@@type": "SearchAction",
            "target": "{{ url('/exploreDrops') }}?search={search_term_string}",
            "query-input": "required name=search_term_string"
            }
        }
    </script>

    {{-- Google Analytics --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FJPCNBEZWN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-FJPCNBEZWN');
    </script>

    {{-- Google Tag Manager --}}
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l !== 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-P5VLD7S8');</script>

    @stack('head')
</head>

<body class="{{ $bodyClass ?? 'dark-theme' }}">

{{-- Skip to content link for accessibility --}}
<a href="#main-content" class="skip-to-content">Skip to main content</a>

<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5VLD7S8" height="0" width="0"
            style="display:none;visibility:hidden" title="Google Tag Manager"></iframe>
</noscript>

<div class="front" id="main-wrapper">

    <header class="header landing" role="banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="navigation">
                        @php $currentPage = $currentPage ?? ''; @endphp
                        <nav class="navbar navbar-expand-lg navbar-dark" aria-label="Main navigation">
                            <div class="brand-logo">
                                <a href="{{ route('home') }}" class="d-flex align-items-center"
                                   aria-label="NFTDropCalendar home">
                                    <img src="{{ asset('logo.png') }}" alt="" class="logo"
                                         style="height: 40px; margin-right: 0.75rem;" width="40" height="40">
                                    <span style="color: var(--nft-text); font-weight: 700; font-size: 1.125rem;">NFTDropCalendar</span>
                                </a>
                            </div>
                            <button aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation menu" class="navbar-toggler"
                                    data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                                <span class="navbar-toggler-icon" aria-hidden="true"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto align-items-center">
                                    <li class="nav-item"><a
                                            class="nav-link {{ $currentPage === 'index' ? 'active' : '' }}"
                                            href="{{ route('home') }}" {{ $currentPage === 'index' ? 'aria-current="page"' : '' }}>Home</a>
                                    </li>
                                    <li class="nav-item"><a
                                            class="nav-link {{ $currentPage === 'exploreDrops' ? 'active' : '' }}"
                                            href="{{ route('drops.explore') }}" {{ $currentPage === 'exploreDrops' ? 'aria-current="page"' : '' }}>Explore
                                            Drops</a></li>
                                    <li class="nav-item"><a
                                            class="nav-link {{ $currentPage === 'exploreProject' ? 'active' : '' }}"
                                            href="{{ route('projects.explore') }}" {{ $currentPage === 'exploreProject' ? 'aria-current="page"' : '' }}>Projects</a>
                                    </li>
                                    <li class="nav-item"><a
                                            class="nav-link {{ $currentPage === 'faq' ? 'active' : '' }}"
                                            href="{{ route('faq') }}" {{ $currentPage === 'faq' ? 'aria-current="page"' : '' }}>FAQ</a>
                                    </li>
                                    <li class="nav-item"><a
                                            class="nav-link {{ $currentPage === 'contact' ? 'active' : '' }}"
                                            href="{{ route('contact') }}" {{ $currentPage === 'contact' ? 'aria-current="page"' : '' }}>Contact</a>
                                    </li>
                                    <li class="nav-item ms-2"><a class="btn btn-primary"
                                                                 href="{{ route('drops.create') }}">List Drop</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main id="main-content" role="main">
        @yield('content')
    </main>

    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('logo.png') }}" alt="" style="height: 32px; margin-right: 0.75rem;"
                             width="32" height="32">
                        <h2 style="color: var(--nft-text); margin: 0; font-weight: 700; font-size: 1.25rem;">
                            NFTDropCalendar</h2>
                    </div>
                    <p style="font-size: 0.95rem;">Discover upcoming NFT drops before they launch. The essential
                        calendar for NFT collectors and creators.</p>
                </div>
                <nav class="col-lg-3 col-md-6 mb-4" aria-label="Explore links">
                    <div class="footer-widget">
                        <h2 class="widget-title" style="font-size: 1.125rem;">Explore</h2>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('drops.explore') }}">Browse Drops</a></li>
                            <li class="mb-2"><a href="{{ route('projects.explore') }}">View Projects</a></li>
                            <li><a href="{{ route('drops.create') }}">Submit Your Drop</a></li>
                        </ul>
                    </div>
                </nav>
                <nav class="col-lg-3 col-md-6 mb-4" aria-label="Support links">
                    <div class="footer-widget">
                        <h2 class="widget-title" style="font-size: 1.125rem;">Support</h2>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('faq') }}">FAQ</a></li>
                            <li class="mb-2"><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="{{ url('prices') }}">Pricing</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h2 class="widget-title" style="font-size: 1.125rem;">Connect</h2>
                        <ul class="social-icons list-unstyled">
                            <li style="display: inline-block;">
                                <a href="https://twitter.com/DropCalendarNFT" target="_blank" rel="noopener noreferrer"
                                   aria-label="Follow us on Twitter">
                                    <i class="fab fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; {{ date('Y') }} NFTDropCalendar. Discover NFT drops before they launch.</p>
            </div>
        </div>
    </footer>

</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('js/scripts.js') }}" defer></script>

@stack('scripts')

</body>
</html>
