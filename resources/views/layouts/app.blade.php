<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $seoDescription ?? 'Discover the latest NFT drops and release dates on our comprehensive NFT calendar. Stay updated with upcoming NFT collections, drops, and auctions in one place.' }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="NFT, NFT drops, NFT calendar, NFT release dates, NFT collections">
    <meta name="author" content="NFTDropCalendar">
    <title>NFTDropCalendar | {{ $pageTitle ?? 'Home' }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="16x16" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nft-premium.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <meta name="theme-color" content="#050816">

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FJPCNBEZWN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-FJPCNBEZWN');
    </script>

    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P5VLD7S8');</script>

    @stack('head')
</head>

<body class="{{ $bodyClass ?? '@@dashboard dark-theme' }}">

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5VLD7S8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <div class="front" id="main-wrapper">

        <div class="header landing">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="navigation">
                            @php $currentPage = $currentPage ?? ''; @endphp
                            <nav class="navbar navbar-expand-lg navbar-dark">
                                <div class="brand-logo">
                                    <a href="{{ route('home') }}" class="d-flex align-items-center">
                                        <img src="{{ asset('logo.png') }}" alt="NFTDropCalendar" class="logo" style="height: 40px; margin-right: 0.75rem;">
                                        <span style="color: var(--nft-text); font-weight: 700; font-size: 1.125rem;">NFTDropCalendar</span>
                                    </a>
                                </div>
                                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ms-auto align-items-center">
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'index' ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'exploreDrops' ? 'active' : '' }}" href="{{ route('drops.explore') }}">Explore Drops</a></li>
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'exploreProject' ? 'active' : '' }}" href="{{ route('projects.explore') }}">Projects</a></li>
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'faq' ? 'active' : '' }}" href="{{ route('faq') }}">FAQ</a></li>
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                                        <li class="nav-item ms-2"><a class="btn btn-primary" href="{{ route('drops.create') }}">List Drop</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main>
            @yield('content')
        </main>

        <div class="footer">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('logo.png') }}" alt="NFTDropCalendar" style="height: 32px; margin-right: 0.75rem;">
                            <h5 style="color: var(--nft-text); margin: 0; font-weight: 700;">NFTDropCalendar</h5>
                        </div>
                        <p style="font-size: 0.95rem;">Discover upcoming NFT drops before they launch. The essential calendar for NFT collectors and creators.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h4 class="widget-title">Explore</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="{{ route('drops.explore') }}">Browse Drops</a></li>
                                <li class="mb-2"><a href="{{ route('projects.explore') }}">View Projects</a></li>
                                <li><a href="{{ route('drops.create') }}">Submit Your Drop</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h4 class="widget-title">Support</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="{{ route('faq') }}">FAQ</a></li>
                                <li class="mb-2"><a href="{{ route('contact') }}">Contact Us</a></li>
                                <li><a href="{{ url('prices') }}">Pricing</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h4 class="widget-title">Connect</h4>
                            <ul class="social-icons list-unstyled">
                                <li style="display: inline-block;"><a href="https://twitter.com/DropCalendarNFT" target="_blank" rel="noopener noreferrer" title="Follow us on Twitter"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <p>&copy; 2024 NFTDropCalendar. Discover NFT drops before they launch.</p>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    @stack('scripts')

</body>
</html>
