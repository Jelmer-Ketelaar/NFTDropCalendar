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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

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

        <div class="header landing" style="z-index: 1000;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="navigation">
                            @php $currentPage = $currentPage ?? ''; @endphp
                            <nav class="navbar navbar-expand-lg navbar-dark">
                                <div class="brand-logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('logo.png') }}" alt="NFTDropCalendar Logo" class="logo" style="height:40px">
                                    </a>
                                </div>
                                <div>
                                    <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" style="position: relative; right: 0;">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                </div>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto">
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'index' ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'exploreDrops' ? 'active' : '' }}" href="{{ route('drops.explore') }}">Drops</a></li>
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'exploreProject' ? 'active' : '' }}" href="{{ route('projects.explore') }}">Projects</a></li>
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'prices' ? 'active' : '' }}" href="{{ url('prices') }}">Our Prices</a></li>
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'update' ? 'active' : '' }}" href="{{ route('update') }}">Update your project</a></li>
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'faq' ? 'active' : '' }}" href="{{ route('faq') }}">FAQ</a></li>
                                        <li class="nav-item"><a class="nav-link {{ $currentPage === 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                                        <li><a class="btn btn-primary {{ $currentPage === 'listDropFree' ? 'active' : '' }}" id="drop" href="{{ route('drops.create') }}">List Drop</a></li>
                                        <li><a class="btn btn-primary {{ $currentPage === 'listProjectFree' ? 'active' : '' }}" id="project" href="{{ route('projects.create') }}">List Project</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <div class="notable-drops bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-7 col-sm-8">
                        <div class="bottom-logo">
                            <p>The best NFT Calendar tool of all time! Get all information about a Project/Drop in one view.</p>
                        </div>
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('logo.png') }}" alt="logo" class="logo" style="height:40px">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="footer-widget">
                            <h4 class="widget-title">Explore</h4>
                            <ul>
                                <li><a href="{{ route('drops.explore') }}">Drops</a></li>
                                <li><a href="{{ route('projects.explore') }}">Projects</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="footer-widget">
                            <h4 class="widget-title">Help & Support</h4>
                            <ul>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="footer-widget">
                            <h4 class="widget-title">Stay Connected</h4>
                            <ul class="social-icons">
                                <li><a href="https://twitter.com/DropCalendarNFT" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="copyright">
                            <p>&copy; Copyright 2024 NFTDropCalendar. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>

    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    @stack('scripts')

</body>
</html>
