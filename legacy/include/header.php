<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover the latest NFT drops and release dates on our comprehensive NFT calendar. Stay updated with upcoming NFT collections, drops, and auctions in one place.">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="NFT, NFT drops, NFT calendar, NFT release dates, NFT collections">
    <meta name="author" content="NFTDropCalendar">
    <title>NFTDropCalendar | <?php echo $paginanaam; ?></title>

    <!-- Favicon icon -->
    <link rel="icon" href="favicon.ico" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FJPCNBEZWN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-FJPCNBEZWN');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P5VLD7S8');</script>
    <!-- End Google Tag Manager -->
</head>

<body class="@@dashboard dark-theme">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5VLD7S8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="front" id="main-wrapper">

        <div class="header landing" style="z-index: 1000;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="navigation">
                         <?php $currentPage = basename($_SERVER['PHP_SELF'], ".php"); ?>
                            <nav class="navbar navbar-expand-lg navbar-dark">
                                <div class="brand-logo">
                                    <a href="index">
                                        <img src="logo.png" alt="NFTDropCalendar Logo" class="logo" style="height:40px">
                                    </a>
                                </div>
                                <div>
                                    <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" style="position: relative; right: 0;">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                </div>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto">
                                        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'index') ? 'active' : '' ?>" href="index">Home</a></li>
                                        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'exploreDrops') ? 'active' : '' ?>" href="exploreDrops">Drops</a></li>
                                        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'exploreProject') ? 'active' : '' ?>" href="exploreProject">Projects</a></li>
                                        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'prices') ? 'active' : '' ?>" href="prices">Our Prices</a></li>
                                        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'update') ? 'active' : '' ?>" href="update">Update your project</a></li>
                                        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'faq') ? 'active' : '' ?>" href="faq">FAQ</a></li>
                                        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'contact') ? 'active' : '' ?>" href="contact">Contact</a></li>
                                        <li><a class="btn btn-primary <?= ($currentPage == 'listDropFree') ? 'active' : '' ?>" id="drop" href="listDropFree">List Drop</a></li>
                                        <li><a class="btn btn-primary <?= ($currentPage == 'listProjectFree') ? 'active' : '' ?>" id="project" href="listProjectFree">List Project</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
