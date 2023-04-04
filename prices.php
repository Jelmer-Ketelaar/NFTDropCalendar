<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FJPCNBEZWN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FJPCNBEZWN');
</script>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>NFTDropCalendar</title>
    <meta content="Discover extraordinary NFTs">

<!-- Favicon icon -->
    <link href"favicon.ico" rel="icon" sizes="16x16" type="image/png">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/banner.css" rel="stylesheet">
    <link href="preloader.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body class="@@dasboard dark-theme">
    
<!--<!--CSS Spinner-->
<!--<div class="spinner-wrapper">-->
<!--<div class="spinner"></div>-->
<!--</div>-->

<style>
    .spinner-wrapper {
position: fixed;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ff6347;
z-index: 999999;
}

.spinner {
  width: 100px;
  height: 100px;
  background-color: #ffffff;

    position: absolute;
    top: 48%;
    left: 48%;
  -webkit-animation: sk-rotateplane 1.2s infinite ease-in-out;
  animation: sk-rotateplane 1.2s infinite ease-in-out;
}

@-webkit-keyframes sk-rotateplane {
  0% { -webkit-transform: perspective(120px) }
  50% { -webkit-transform: perspective(120px) rotateY(180deg) }
  100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
}

@keyframes sk-rotateplane {
  0% { 
    transform: perspective(120px) rotateX(0deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg) 
  } 50% { 
    transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg) 
  } 100% { 
    transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
    -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
  }
}


@-webkit-keyframes flow {
	0% { left:-20px;opacity: 0;}
	50% {left:100px;opacity: 0.3;}
    100%{ left:180px;opacity: 0;}
}
@keyframes flow {
	0% { left:-20px;opacity: 0;}
	50% {left:100px;opacity: 0.3;}
    100%{ left:180px;opacity: 0;}
}

.glow{ background: rgb(255,255,255); width:40px; height:100%; z-index:999; position:absolute;-webkit-animation: flow 1.5s linear infinite;-moz-animation: flow 1.5s linear infinite;-webkit-transform: skew(20deg);
	   -moz-transform: skew(20deg);
	     -o-transform: skew(20deg);background: -moz-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0) 1%, rgba(255,255,255,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,0)), color-stop(1%,rgba(255,255,255,0)), color-stop(100%,rgba(255,255,255,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 1%,rgba(255,255,255,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 1%,rgba(255,255,255,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 1%,rgba(255,255,255,1) 100%); /* IE10+ */
background: linear-gradient(to right, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 1%,rgba(255,255,255,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#ffffff',GradientType=1 ); /* IE6-9 */ border-left:1px solid #fff;}
</style>


<div class="front" id="main-wrapper">

    <div class="header landing" style="z-index: 1000;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="navigation">
                        <nav class="navbar navbar-expand-lg navbar-dark">
                            <div class="brand-logo">
                                <a href="index.php">
                                    <img src="logo.png" alt="" class="logo" style="height:40px">
                                </a>
                            </div>
                            <div>   
                            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button" style="position: relative; right: 0;">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            </div>
                         <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto">
                                    <!--<li style="display: none;" class="nav-item"><a class="nav-link" style="display: none;" href="listProject.php">List Project</a></li>-->
                                    <!--<li style="display: none;" class="nav-item"><a class="nav-link" style="display: none;" href="listDrop.php">List Drop</a></li>   -->
                                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="exploreDrops.php">Drops </a></li>
                                    <li class="nav-item"><a class="nav-link" href="exploreProject.php">Projects</a></li>
                                     <!--<li class="nav-item"><a class="nav-link" style="width: 165px;" href="update.php">Update your project</a></li>-->
                                    <li class="nav-item"><a class="nav-link" style="width: 100px;" href="prices.php">Our Prices</a></li>
                                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                                    <!--<li> <a class="btn btn-primary" id="project" href="listProject.php">List Project</a></li>-->
                                    <!--<li> <a class="btn btn-primary" id="drop" href="listDrop.php">List Drop</a></li>-->
                                    </ul>
                            </div>
                            <!--<a class="btn btn-primary" style="margin-right: 10px;" id="project" href="listProject.php">List Project</a>-->
                            <!--<a class="btn btn-primary" id="drop" href="listDrop.php">List Drop</a>-->
                        </nav>
                    
                </div>
            </div>
        </div>
        </div>
    </div>
<main>
    <div class="services my-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2>Services</h2>
    <div class="mt-4 md:flex text-base text-gray-light">
        <div class="service mr-8 mb-2 flex items-center">
            <span class="service-icon mr-3">
                <img alt="Full support" src="https://nftsniper.net/images/support.svg">
            </span>
            <span class="service-description">Full support within 24 hours</span>
        </div>
        <div class="service flex mb-2 items-center">
            <span class="service-icon mr-3">
                <img alt="Updates" src="https://nftsniper.net/images/refresh.svg">
            </span>
            <span class="service-description">Unlimited updates to your collection</span>
        </div>
    </div>
</div>

    <div class="pb-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center sm:text-left bg-gray rounded-md mb-16 py-8 sm:py-10 px-8 lg:px-16 flex flex-col sm:flex-row">
            <h3 class="sm:hidden text-center font-bold text-lg mb-5">List your collection</h3>
            <div class="sm:mr-12 mb-5 sm:min-w-[7rem] lg:min-w-[9rem] flex justify-center">
                <img class="md:w-full" alt="List your collection" src="https://nftsniper.net/images/planet.svg">
            </div>
            <div>
                <h3 class="hidden sm:block font-bold text-xl mb-5">List your collection</h3>
                <p class="paragraph">
                    Get an informative page of your project on NFTDropCalendar. The page includes all the info you've filled in about the
                    project.
                </p>
                <p class="paragraph mb-6">
                    We approve (or decline) your project within 12 hours after submission.
                </p>
                <p class="items-center flex flex-col sm:flex-row">
                    <span class="text-gray-light text-base sm:text-lg mb-4 sm:mb-0">
                        Price: <span class="text-white font-bold text-2xl uppercase mr-8">0.002 ETH / 0.059 SOL</span>
                    </span>
                    <a href="listDrop.php" class="btn btn-primary">
                        List drop
                    </a>
                    <a href="listProject.php" class="btn btn-primary">
                        List project
                    </a>
                </p>
            </div>
        </div>

        <!-- Advertisement Options -->
        <h3 class="font-bold text-xl mb-5">Advertisement Options</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 mb-16 gap-5 sm:gap-10">
            <div class="text-center sm:text-left bg-gray rounded-md py-8 sm:py-10 px-8 lg:px-10 flex flex-col">
                <div class="h-16 mb-6 flex justify-center">
                    <img class="h-full" alt="Promoted Spot" src="promo.png">
                </div>
                <div class="text-center flex flex-col md:flex-grow">
                    <h3 class="hidden sm:block font-bold text-xl mb-1">Promoted Spot</h3>
                    <p class="paragraph mb-6">
                        Receive a coloured border and a spot in the promoted section: the first section people will see
                        when visiting NFTDropCalendar.
                    </p>
                    <p class="mt-auto">
                        <span class="text-4xl font-bold">
                            0.04ETH
                        </span>
                        <span class="font-bold">
                            / week
                        </span>
                    </p>
                </div>
            </div>
            <div class="text-center sm:text-left bg-gray rounded-md py-8 sm:py-10 px-8 lg:px-10 flex flex-col">
                <h3 class="sm:hidden text-center font-bold text-lg mb-5">Banner Ad</h3>
                <div class="h-16 mb-6 flex justify-center">
                    <img class="h-full" alt="Banner Ad" src="banner-icon.png" style="border-radius: 30%;">
                </div>
                <div class="text-center flex flex-col md:flex-grow">
                    <h3 class="hidden sm:block font-bold text-xl mb-1">Banner Ad</h3>
                    <p class="paragraph mb-6">
                        A banner shown on the homepage of NFTDropCalendar. This will gain 400% more hype for your project
                    </p>
                    <p class="mt-auto">
                        <span class="text-4xl font-bold">
                            0.08ETH
                        </span>
                        <span class="font-bold">
                            / week
                        </span>
                    </p>
                </div>
            </div>
            <div class="text-center sm:text-left bg-gray rounded-md py-8 sm:py-10 px-8 lg:px-10 flex flex-col">
                <h3 class="sm:hidden text-center font-bold text-lg mb-5">Thumbnail Ad</h3>
                <div class="h-16 mb-6 flex justify-center">
                    <img class="h-full" alt="Banner Ad" src="thumbnail-icon.png" style="border-radius: 30%;">
                </div>
                <div class="text-center flex flex-col md:flex-grow">
                    <h3 class="hidden sm:block font-bold text-xl mb-1">Thumbnail Ad</h3>
                    <p class="paragraph mb-6">
                        A thumbnail shown on the homepage of NFTDropCalendar. This will gain 450% more hype for your project
                    </p>
                    <p class="mt-auto">
                        <span class="text-4xl font-bold">
                            0.1ETH
                        </span>
                        <span class="font-bold">
                            / week
                        </span>
                    </p>
                </div>
            </div>
        <!-- Advertising Plans for Upcoming Collections -->
    </div>
</main>
<style>.grecaptcha-badge {
    visibility: hidden !important
}

/*! tailwindcss v2.2.17 | MIT License | https://tailwindcss.com*//*! modern-normalize v1.1.0 | MIT License | https://github.com/sindresorhus/modern-normalize */
html {
    -webkit-text-size-adjust: 100%;
    line-height: 1.15;
    -moz-tab-size: 4;
    -o-tab-size: 4;
    tab-size: 4
}

body {
    font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji;
    margin: 0
}

hr {
    color: inherit;
    height: 0
}

abbr[title] {
    -webkit-text-decoration: underline dotted;
    text-decoration: underline dotted
}

b, strong {
    font-weight: bolder
}

code, kbd, pre, samp {
    font-family: ui-monospace, SFMono-Regular, Consolas, Liberation Mono, Menlo, monospace;
    font-size: 1em
}

small {
    font-size: 80%
}

sub, sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: baseline
}

sub {
    bottom: -.25em
}

sup {
    top: -.5em
}

table {
    border-color: inherit;
    text-indent: 0
}

button, input, optgroup, select, textarea {
    font-family: inherit;
    font-size: 100%;
    line-height: 1.15;
    margin: 0
}

button, select {
    text-transform: none
}

[type=button], [type=reset], [type=submit], button {
    -webkit-appearance: button
}

::-moz-focus-inner {
    border-style: none;
    padding: 0
}

:-moz-focusring {
    outline: 1px dotted ButtonText
}

:-moz-ui-invalid {
    box-shadow: none
}

legend {
    padding: 0
}

progress {
    vertical-align: baseline
}

::-webkit-inner-spin-button, ::-webkit-outer-spin-button {
    height: auto
}

[type=search] {
    -webkit-appearance: textfield;
    outline-offset: -2px
}

::-webkit-search-decoration {
    -webkit-appearance: none
}

::-webkit-file-upload-button {
    -webkit-appearance: button;
    font: inherit
}

summary {
    display: list-item
}

blockquote, dd, dl, figure, h1, h2, h3, h4, h5, h6, hr, p, pre {
    margin: 0
}

button {
    background-color: transparent;
    background-image: none
}

fieldset, ol, ul {
    margin: 0;
    padding: 0
}

ol, ul {
    list-style: none
}

html {
    font-family: Poppins, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
    line-height: 1.5
}

body {
    font-family: inherit;
    line-height: inherit
}

*, :after, :before {
    border: 0 solid;
    box-sizing: border-box
}

hr {
    border-top-width: 1px
}

img {
    border-style: solid
}

textarea {
    resize: vertical
}

input::-moz-placeholder, textarea::-moz-placeholder {
    color: #9ca3af;
    opacity: 1
}

input:-ms-input-placeholder, textarea:-ms-input-placeholder {
    color: #9ca3af;
    opacity: 1
}

input::placeholder, textarea::placeholder {
    color: #9ca3af;
    opacity: 1
}

[role=button], button {
    cursor: pointer
}

:-moz-focusring {
    outline: auto
}

table {
    border-collapse: collapse
}

h1, h2, h3, h4, h5, h6 {
    font-size: inherit;
    font-weight: inherit
}

a {
    color: inherit;
    text-decoration: inherit
}

button, input, optgroup, select, textarea {
    color: inherit;
    line-height: inherit;
    padding: 0
}

code, kbd, pre, samp {
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace
}

audio, canvas, embed, iframe, img, object, svg, video {
    display: block;
    vertical-align: middle
}

img, video {
    height: auto;
    max-width: 100%
}

[hidden] {
    display: none
}

*, :after, :before {
    --tw-translate-x: 0;
    --tw-translate-y: 0;
    --tw-rotate: 0;
    --tw-skew-x: 0;
    --tw-skew-y: 0;
    --tw-scale-x: 1;
    --tw-scale-y: 1;
    --tw-transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    --tw-border-opacity: 1;
    --tw-ring-inset: var(--tw-empty, /*!*/ /*!*/);
    --tw-ring-offset-width: 0px;
    --tw-ring-offset-color: #fff;
    --tw-ring-color: rgba(59, 130, 246, 0.5);
    --tw-ring-offset-shadow: 0 0 #0000;
    --tw-ring-shadow: 0 0 #0000;
    --tw-shadow: 0 0 #0000;
    --tw-blur: var(--tw-empty, /*!*/ /*!*/);
    --tw-brightness: var(--tw-empty, /*!*/ /*!*/);
    --tw-contrast: var(--tw-empty, /*!*/ /*!*/);
    --tw-grayscale: var(--tw-empty, /*!*/ /*!*/);
    --tw-hue-rotate: var(--tw-empty, /*!*/ /*!*/);
    --tw-invert: var(--tw-empty, /*!*/ /*!*/);
    --tw-saturate: var(--tw-empty, /*!*/ /*!*/);
    --tw-sepia: var(--tw-empty, /*!*/ /*!*/);
    --tw-drop-shadow: var(--tw-empty, /*!*/ /*!*/);
    --tw-filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
    border-color: rgba(229, 231, 235, var(--tw-border-opacity))
}

[multiple], [type=date], [type=datetime-local], [type=email], [type=month], [type=number], [type=password], [type=search], [type=tel], [type=text], [type=time], [type=url], [type=week], select, textarea {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: #fff;
    border-color: #6b7280;
    border-radius: 0;
    border-width: 1px;
    font-size: 1rem;
    line-height: 1.5rem;
    padding: .5rem .75rem
}

[multiple]:focus, [type=date]:focus, [type=datetime-local]:focus, [type=email]:focus, [type=month]:focus, [type=number]:focus, [type=password]:focus, [type=search]:focus, [type=tel]:focus, [type=text]:focus, [type=time]:focus, [type=url]:focus, [type=week]:focus, select:focus, textarea:focus {
    --tw-ring-inset: var(--tw-empty, /*!*/ /*!*/);
    --tw-ring-offset-width: 0px;
    --tw-ring-offset-color: #fff;
    --tw-ring-color: #2563eb;
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
    border-color: #2563eb;
    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
    outline: 2px solid transparent;
    outline-offset: 2px
}

input::-moz-placeholder, textarea::-moz-placeholder {
    color: #6b7280;
    opacity: 1
}

input:-ms-input-placeholder, textarea:-ms-input-placeholder {
    color: #6b7280;
    opacity: 1
}

input::placeholder, textarea::placeholder {
    color: #6b7280;
    opacity: 1
}

::-webkit-datetime-edit-fields-wrapper {
    padding: 0
}

::-webkit-date-and-time-value {
    min-height: 1.5em
}

select {
    -webkit-print-color-adjust: exact;
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3E%3C/svg%3E");
    background-position: right .5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    color-adjust: exact;
    padding-right: 2.5rem
}

[multiple] {
    -webkit-print-color-adjust: unset;
    background-image: none;
    background-position: 0 0;
    background-repeat: unset;
    background-size: initial;
    color-adjust: unset;
    padding-right: .75rem
}

[type=checkbox], [type=radio] {
    -webkit-print-color-adjust: exact;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: #fff;
    background-origin: border-box;
    border-color: #6b7280;
    border-width: 1px;
    color: #2563eb;
    color-adjust: exact;
    display: inline-block;
    flex-shrink: 0;
    height: 1rem;
    padding: 0;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    vertical-align: middle;
    width: 1rem
}

[type=checkbox] {
    border-radius: 0
}

[type=radio] {
    border-radius: 100%
}

[type=checkbox]:focus, [type=radio]:focus {
    --tw-ring-inset: var(--tw-empty, /*!*/ /*!*/);
    --tw-ring-offset-width: 2px;
    --tw-ring-offset-color: #fff;
    --tw-ring-color: #2563eb;
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
    outline: 2px solid transparent;
    outline-offset: 2px
}

[type=checkbox]:checked, [type=radio]:checked {
    background-color: ;
    background-position: 50%;
    background-repeat: no-repeat;
    background-size: 100% 100%;
    border-color: transparent
}

[type=checkbox]:checked {
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg viewBox='0 0 16 16' fill='%23fff' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12.207 4.793a1 1 0 0 1 0 1.414l-5 5a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L6.5 9.086l4.293-4.293a1 1 0 0 1 1.414 0z'/%3E%3C/svg%3E")
}

[type=radio]:checked {
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg viewBox='0 0 16 16' fill='%23fff' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='8' cy='8' r='3'/%3E%3C/svg%3E")
}

[type=checkbox]:checked:focus, [type=checkbox]:checked:hover, [type=radio]:checked:focus, [type=radio]:checked:hover {
    background-color:;
    border-color: transparent
}

[type=checkbox]:indeterminate {
    background-color:;
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3E%3Cpath stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3E%3C/svg%3E");
    background-position: 50%;
    background-repeat: no-repeat;
    background-size: 100% 100%;
    border-color: transparent
}

[type=checkbox]:indeterminate:focus, [type=checkbox]:indeterminate:hover {
    background-color:;
    border-color: transparent
}

[type=file] {
    background: unset;
    border-color: inherit;
    border-radius: 0;
    border-width: 0;
    font-size: unset;
    line-height: inherit;
    padding: 0
}

[type=file]:focus {
    outline: 1px auto -webkit-focus-ring-color
}

body {
    --tw-bg-opacity: 1;
    --tw-text-opacity: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    /*background-color: rgba(26, 28, 41, var(--tw-bg-opacity));*/
    color: rgba(255, 255, 255, var(--tw-text-opacity));
    display: flex;
    flex-direction: column;
    font-family: Poppins, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
    font-size: .875rem;
    line-height: 1.25rem;
    min-height: 100vh
}

[x-cloak] {
    display: none
}

.bg-blur {
    -webkit-backdrop-filter: blur(8px);
    backdrop-filter: blur(8px);
    background: rgba(26, 28, 41, .5)
}

input[type=checkbox] {
    border-radius: .125rem;
    cursor: pointer;
    height: 1.25rem;
    width: 1.25rem
}

input[type=checkbox]:checked, input[type=checkbox]:checked:focus, input[type=checkbox]:checked:hover {
    --tw-bg-opacity: 1;
    background-color: rgba(0, 184, 127, var(--tw-bg-opacity))
}

input[type=checkbox]:focus {
    box-shadow: none !important
}

@font-face {
    font-family: Poppins;
    font-style: normal;
    font-weight: 400;
    src: url(/fonts/poppins-v15-latin-regular.eot?18418ab667b4f80aa3cf1fe2572b4ce4);
    src: local(""), url(/fonts/poppins-v15-latin-regular.eot?18418ab667b4f80aa3cf1fe2572b4ce4?#iefix) format("embedded-opentype"), url(/fonts/poppins-v15-latin-regular.woff2?5b8f3ba886526963a788fb19c016bcee) format("woff2"), url(/fonts/poppins-v15-latin-regular.woff?c14093cee8c440c1884e38f2a2732bd6) format("woff"), url(/fonts/poppins-v15-latin-regular.ttf?b739ab04747cf8e3325a748352a3d3cb) format("truetype"), url(/fonts/poppins-v15-latin-regular.svg?04277a799cb3f1b29dfad816139bad03#Poppins) format("svg")
}

@font-face {
    font-family: Poppins;
    font-style: normal;
    font-weight: 500;
    src: url(/fonts/poppins-v15-latin-500.eot?e154054d9b801f3e9d2f270e42f831f9);
    src: local(""), url(/fonts/poppins-v15-latin-500.eot?e154054d9b801f3e9d2f270e42f831f9?#iefix) format("embedded-opentype"), url(/fonts/poppins-v15-latin-500.woff2?dc16a3592fdb61b620cc43491f783eb7) format("woff2"), url(/fonts/poppins-v15-latin-500.woff?ff86872bdc62f119cb706aead2388c8b) format("woff"), url(/fonts/poppins-v15-latin-500.ttf?9b6457625f42c09416f4ff0c6481fa8d) format("truetype"), url(/fonts/poppins-v15-latin-500.svg?138d54dda216e46d983051607175c7fa#Poppins) format("svg")
}

h2 {
    font-size: 1.25rem;
    font-weight: 500;
    line-height: 1.75rem
}

@media (min-width: 640px) {
    h2 {
        font-size: 1.25rem;
        line-height: 1.75rem
    }
}

@media (min-width: 768px) {
    h2 {
        font-size: 1.875rem;
        line-height: 2.25rem
    }
}

.paragraph {
    --tw-text-opacity: 1;
    color: rgba(153, 155, 166, var(--tw-text-opacity));
    font-size: .875rem;
    line-height: 1.25rem;
    margin-bottom: .75rem
}

@media (min-width: 640px) {
    .paragraph {
        font-size: 1rem;
        line-height: 1.5rem
    }
}

.btn {
    align-items: center;
    border-radius: 9999px;
    display: inline-flex;
    font-weight: 500;
    justify-content: center;
    line-height: 1.5rem;
    padding: .5rem 1.75rem;
    text-transform: uppercase
}

.btn-primary {
    --tw-text-opacity: 1;
    background-image: linear-gradient(273.19deg, #03cd8f 4.57%, #0eeba3 95.62%);
    color: rgba(42, 45, 62, var(--tw-text-opacity))
}

.btn-primary-alt {
    --tw-border-opacity: 1;
    --tw-text-opacity: 1;
    border-color: rgba(0, 184, 127, var(--tw-border-opacity));
    border-width: 1px;
    color: rgba(0, 184, 127, var(--tw-text-opacity))
}

.btn-primary-alt:hover {
    background-image: linear-gradient(273.19deg, #03cd8f 4.57%, #0eeba3 95.62%)
}

.btn-primary-alt:hover, .btn-secondary {
    --tw-text-opacity: 1;
    color: rgba(42, 45, 62, var(--tw-text-opacity))
}

.btn-secondary {
    background-image: linear-gradient(273.19deg, #0077e4 4.57%, #329dff 95.62%);
}

.btn-secondary-alt {
    --tw-border-opacity: 1;
    --tw-text-opacity: 1;
    border-color: rgba(67, 165, 255, var(--tw-border-opacity));
    border-width: 1px;
    color: rgba(67, 165, 255, var(--tw-text-opacity))
}

.btn-secondary-alt:hover {
    --tw-text-opacity: 1;
    background-image: linear-gradient(273.19deg, #0077e4 4.57%, #329dff 95.62%);;
    color: rgba(42, 45, 62, var(--tw-text-opacity))
}

.btn-gray {
    --tw-bg-opacity: 1;
    --tw-text-opacity: 1;
    background-color: rgba(153, 155, 166, var(--tw-bg-opacity));
    color: rgba(42, 45, 62, var(--tw-text-opacity))
}

table th {
    font-weight: 500
}

.table-head-pill {
    --tw-text-opacity: 1;
    background-color: rgba(38, 151, 255, .2);
    border-radius: .375rem;
    color: rgba(67, 165, 255, var(--tw-text-opacity));
    font-size: .63rem;
    margin-left: .5rem;
    padding-bottom: 1px;
    padding-left: .25rem;
    padding-right: .25rem;
    padding-top: 2px;
    text-transform: lowercase
}

.collections-table td, .collections-table td div {
    white-space: nowrap
}

.social-button {
    --tw-bg-opacity: 1;
    align-items: center;
    background-color: rgba(26, 28, 41, var(--tw-bg-opacity));
    border-radius: 9999px;
    display: flex;
    height: 2rem;
    justify-content: center;
    margin-bottom: 1rem;
    margin-right: 1rem;
    padding: .5rem;
    width: 2rem
}

.nav-search {
    flex-basis: 100%
}

@media (min-width: 768px) {
    .nav-search {
        flex-basis: 0
    }
}

.custom-scrollbar::-webkit-scrollbar {
    height: 4px;
    width: 4px
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: transparent
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #04ad79;
    border-radius: 20px
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #04ad79
}

.custom-scrollbar-secondary::-webkit-scrollbar-thumb, .custom-scrollbar-secondary::-webkit-scrollbar-thumb:hover {
    background: #43a5ff
}

.custom-scrollbar-secondary::-webkit-scrollbar-track {
    background: #1a1c29
}

.pointer-events-none {
    pointer-events: none
}

.visible {
    visibility: visible
}

.static {
    position: static
}

.fixed {
    position: fixed
}

.absolute {
    position: absolute
}

.relative {
    position: relative
}

.sticky {
    position: -webkit-sticky;
    position: sticky
}

.inset-0 {
    bottom: 0;
    top: 0
}

.inset-0, .inset-x-0 {
    left: 0;
    right: 0
}

.inset-y-0 {
    bottom: 0;
    top: 0
}

.right-0 {
    right: 0
}

.top-8 {
    top: 2rem
}

.left-0 {
    left: 0
}

.-top-4 {
    top: -1rem
}

.bottom-2 {
    bottom: .5rem
}

.right-2 {
    right: .5rem
}

.right-6 {
    right: 1.5rem
}

.top-3 {
    top: .75rem
}

.top-0 {
    top: 0
}

.left-1\/2 {
    left: 50%
}

.bottom-11 {
    bottom: 2.75rem
}

.right-5 {
    right: 1.25rem
}

.bottom-3 {
    bottom: .75rem
}

.top-9 {
    top: 2.25rem
}

.-top-1 {
    top: -.25rem
}

.z-0 {
    z-index: 0
}

.z-50 {
    z-index: 50
}

.z-10 {
    z-index: 10
}

.z-30 {
    z-index: 30
}

.z-40 {
    z-index: 40
}

.z-20 {
    z-index: 20
}

.order-2 {
    order: 2
}

.col-span-2 {
    grid-column: span 2/span 2
}

.col-span-3 {
    grid-column: span 3/span 3
}

.m-0 {
    margin: 0
}

.mx-auto {
    margin-left: auto;
    margin-right: auto
}

.my-8 {
    margin-bottom: 2rem;
    margin-top: 2rem
}

.my-10 {
    margin-bottom: 2.5rem;
    margin-top: 2.5rem
}

.my-4 {
    margin-bottom: 1rem;
    margin-top: 1rem
}

.ml-3 {
    margin-left: .75rem
}

.-ml-px {
    margin-left: -1px
}

.mb-4 {
    margin-bottom: 1rem
}

.mt-8 {
    margin-top: 2rem
}

.mt-2 {
    margin-top: .5rem
}

.mt-4 {
    margin-top: 1rem
}

.mr-8 {
    margin-right: 2rem
}

.mb-2 {
    margin-bottom: .5rem
}

.mr-3 {
    margin-right: .75rem
}

.mb-16 {
    margin-bottom: 4rem
}

.mb-5 {
    margin-bottom: 1.25rem
}

.mb-6 {
    margin-bottom: 1.5rem
}

.mt-auto {
    margin-top: auto
}

.mr-4 {
    margin-right: 1rem
}

.mb-10 {
    margin-bottom: 2.5rem
}

.mr-2 {
    margin-right: .5rem
}

.mb-3 {
    margin-bottom: .75rem
}

.mb-1 {
    margin-bottom: .25rem
}

.mt-3 {
    margin-top: .75rem
}

.mb-7 {
    margin-bottom: 1.75rem
}

.-mr-4 {
    margin-right: -1rem
}

.mt-5 {
    margin-top: 1.25rem
}

.mt-6 {
    margin-top: 1.5rem
}

.mt-1 {
    margin-top: .25rem
}

.ml-2 {
    margin-left: .5rem
}

.-ml-12 {
    margin-left: -3rem
}

.ml-auto {
    margin-left: auto
}

.-mb-1 {
    margin-bottom: -.25rem
}

.mr-1 {
    margin-right: .25rem
}

.ml-1 {
    margin-left: .25rem
}

.-mt-5 {
    margin-top: -1.25rem
}

.mb-8 {
    margin-bottom: 2rem
}

.ml-5 {
    margin-left: 1.25rem
}

.-mt-9 {
    margin-top: -2.25rem
}

.mr-0 {
    margin-right: 0
}

.mr-6 {
    margin-right: 1.5rem
}

.mr-auto {
    margin-right: auto
}

.ml-4 {
    margin-left: 1rem
}

.mt-10 {
    margin-top: 2.5rem
}

.mr-5 {
    margin-right: 1.25rem
}

.ml-6 {
    margin-left: 1.5rem
}

.-mb-3 {
    margin-bottom: -.75rem
}

.mb-14 {
    margin-bottom: 3.5rem
}

.block {
    display: block
}

.inline-block {
    display: inline-block
}

.inline {
    display: inline
}

.flex {
    display: flex
}

.inline-flex {
    display: inline-flex
}

.table {
    display: table
}

.grid {
    display: grid
}

.contents {
    display: contents
}

.hidden {
    display: none
}

.h-5 {
    height: 1.25rem
}

.h-16 {
    height: 4rem
}

.h-full {
    height: 100%
}

.h-14 {
    height: 3.5rem
}

.h-4 {
    height: 1rem
}

.h-1 {
    height: .25rem
}

.h-7 {
    height: 1.75rem
}

.h-6 {
    height: 1.5rem
}

.h-80 {
    height: 20rem
}

.h-3 {
    height: .75rem
}

.h-10 {
    height: 2.5rem
}

.h-8 {
    height: 2rem
}

.h-9 {
    height: 2.25rem
}

.h-0\.5 {
    height: .125rem
}

.h-0 {
    height: 0
}

.max-h-96 {
    max-height: 24rem
}

.min-h-full {
    min-height: 100%
}

.min-h-screen {
    min-height: 100vh
}

.min-h-\[40px\] {
    min-height: 40px
}

.w-5 {
    width: 1.25rem
}

.w-full {
    width: 100%
}

.w-14 {
    width: 3.5rem
}

.w-4 {
    width: 1rem
}

.w-48 {
    width: 12rem
}

.w-8 {
    width: 2rem
}

.w-7 {
    width: 1.75rem
}

.w-6 {
    width: 1.5rem
}

.w-10 {
    width: 2.5rem
}

.w-3 {
    width: .75rem
}

.w-1\/2 {
    width: 50%
}

.w-44 {
    width: 11rem
}

.w-auto {
    width: auto
}

.w-28 {
    width: 7rem
}

.w-72 {
    width: 18rem
}

.w-32 {
    width: 8rem
}

.w-\[420px\] {
    width: 420px
}

.w-11 {
    width: 2.75rem
}

.w-\[30\%\] {
    width: 30%
}

.w-2\/6 {
    width: 33.333333%
}

.w-3\/6 {
    width: 50%
}

.w-1\/6 {
    width: 16.666667%
}

.w-\[18px\] {
    width: 18px
}

.w-5\/12 {
    width: 41.666667%
}

.w-7\/12 {
    width: 58.333333%
}

.w-3\/12 {
    width: 25%
}

.w-4\/12 {
    width: 33.333333%
}

.w-10\/12 {
    width: 83.333333%
}

.w-1\/12 {
    width: 8.333333%
}

.w-11\/12 {
    width: 91.666667%
}

.w-2\/12 {
    width: 16.666667%
}

.w-20 {
    width: 5rem
}

.w-36 {
    width: 9rem
}

.w-1\/3 {
    width: 33.333333%
}

.min-w-\[5\.1rem\] {
    min-width: 5.1rem
}

.min-w-\[90\%\] {
    min-width: 90%
}

.max-w-7xl {
    max-width: 80rem
}

.max-w-full {
    max-width: 100%
}

.max-w-12 {
    max-width: 12rem
}

.max-w-\[350px\] {
    max-width: 350px
}

.flex-1 {
    flex: 1 1 0%
}

.flex-shrink-0 {
    flex-shrink: 0
}

.flex-grow {
    flex-grow: 1
}

.table-auto {
    table-layout: auto
}

.border-collapse {
    border-collapse: collapse
}

.origin-top-left {
    transform-origin: top left
}

.origin-top {
    transform-origin: top
}

.origin-top-right {
    transform-origin: top right
}

.-translate-x-full {
    --tw-translate-x: -100%;
    transform: var(--tw-transform)
}

.translate-x-0 {
    --tw-translate-x: 0px;
    transform: var(--tw-transform)
}

.translate-x-5 {
    --tw-translate-x: 1.25rem;
    transform: var(--tw-transform)
}

.-translate-x-1\/2 {
    --tw-translate-x: -50%;
    transform: var(--tw-transform)
}

.rotate-180 {
    --tw-rotate: 180deg
}

.-rotate-90, .rotate-180 {
    transform: var(--tw-transform)
}

.-rotate-90 {
    --tw-rotate: -90deg
}

.rotate-90 {
    --tw-rotate: 90deg
}

.rotate-90, .scale-95 {
    transform: var(--tw-transform)
}

.scale-95 {
    --tw-scale-x: .95;
    --tw-scale-y: .95
}

.scale-100 {
    --tw-scale-x: 1;
    --tw-scale-y: 1;
    transform: var(--tw-transform)
}

.scale-50 {
    --tw-scale-x: .5;
    --tw-scale-y: .5
}

.scale-50, .transform {
    transform: var(--tw-transform)
}

.cursor-default {
    cursor: default
}

.cursor-pointer {
    cursor: pointer
}

.cursor-wait {
    cursor: wait
}

.resize {
    resize: both
}

.list-inside {
    list-style-position: inside
}

.list-disc {
    list-style-type: disc
}

.grid-cols-1 {
    grid-template-columns:repeat(1, minmax(0, 1fr))
}

.grid-cols-2 {
    grid-template-columns:repeat(2, minmax(0, 1fr))
}

.grid-cols-3 {
    grid-template-columns:repeat(3, minmax(0, 1fr))
}

.grid-cols-7 {
    grid-template-columns:repeat(7, minmax(0, 1fr))
}

.flex-row {
    flex-direction: row
}

.flex-col {
    flex-direction: column
}

.flex-col-reverse {
    flex-direction: column-reverse
}

.flex-wrap {
    flex-wrap: wrap
}

.items-start {
    align-items: flex-start
}

.items-center {
    align-items: center
}

.items-stretch {
    align-items: stretch
}

.justify-start {
    justify-content: flex-start
}

.justify-end {
    justify-content: flex-end
}

.justify-center {
    justify-content: center
}

.justify-between {
    justify-content: space-between
}

.gap-5 {
    gap: 1.25rem
}

.gap-6 {
    gap: 1.5rem
}

.gap-4 {
    gap: 1rem
}

.gap-2 {
    gap: .5rem
}

.gap-y-8 {
    row-gap: 2rem
}

.gap-x-4 {
    -moz-column-gap: 1rem;
    column-gap: 1rem
}

.gap-y-6 {
    row-gap: 1.5rem
}

.space-y-2 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-bottom: calc(.5rem * var(--tw-space-y-reverse));
    margin-top: calc(.5rem * (1 - var(--tw-space-y-reverse)))
}

.space-y-3 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-bottom: calc(.75rem * var(--tw-space-y-reverse));
    margin-top: calc(.75rem * (1 - var(--tw-space-y-reverse)))
}

.space-y-4 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-bottom: calc(1rem * var(--tw-space-y-reverse));
    margin-top: calc(1rem * (1 - var(--tw-space-y-reverse)))
}

.space-x-4 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-left: calc(1rem * (1 - var(--tw-space-x-reverse)));
    margin-right: calc(1rem * var(--tw-space-x-reverse))
}

.space-y-8 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-bottom: calc(2rem * var(--tw-space-y-reverse));
    margin-top: calc(2rem * (1 - var(--tw-space-y-reverse)))
}

.space-y-5 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-bottom: calc(1.25rem * var(--tw-space-y-reverse));
    margin-top: calc(1.25rem * (1 - var(--tw-space-y-reverse)))
}

.space-y-6 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
    margin-top: calc(1.5rem * (1 - var(--tw-space-y-reverse)))
}

.space-y-1 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-bottom: calc(.25rem * var(--tw-space-y-reverse));
    margin-top: calc(.25rem * (1 - var(--tw-space-y-reverse)))
}

.divide-y > :not([hidden]) ~ :not([hidden]) {
    --tw-divide-y-reverse: 0;
    border-bottom-width: calc(1px * var(--tw-divide-y-reverse));
    border-top-width: calc(1px * (1 - var(--tw-divide-y-reverse)))
}

.divide-gray-200 > :not([hidden]) ~ :not([hidden]) {
    --tw-divide-opacity: 1;
    border-color: rgba(229, 231, 235, var(--tw-divide-opacity))
}

.overflow-hidden {
    overflow: hidden
}

.overflow-x-auto {
    overflow-x: auto
}

.overflow-y-auto {
    overflow-y: auto
}

.overflow-y-scroll {
    overflow-y: scroll
}

.truncate {
    overflow: hidden;
    white-space: nowrap
}

.overflow-ellipsis, .truncate {
    text-overflow: ellipsis
}

.whitespace-nowrap {
    white-space: nowrap
}

.rounded-md {
    border-radius: .375rem
}

.rounded {
    border-radius: .25rem
}

.rounded-full {
    border-radius: 9999px
}

.rounded-lg {
    border-radius: .5rem
}

.rounded-xl {
    border-radius: .75rem
}

.rounded-3xl {
    border-radius: 1.5rem
}

.rounded-sm {
    border-radius: .125rem
}

.rounded-l-md {
    border-bottom-left-radius: .375rem;
    border-top-left-radius: .375rem
}

.rounded-r-md {
    border-bottom-right-radius: .375rem;
    border-top-right-radius: .375rem
}

.rounded-t-lg {
    border-top-left-radius: .5rem;
    border-top-right-radius: .5rem
}

.rounded-l-lg {
    border-bottom-left-radius: .5rem;
    border-top-left-radius: .5rem
}

.rounded-r-lg {
    border-bottom-right-radius: .5rem;
    border-top-right-radius: .5rem
}

.border {
    border-width: 1px
}

.border-2 {
    border-width: 2px
}

.border-b {
    border-bottom-width: 1px
}

.border-t {
    border-top-width: 1px
}

.border-l-4 {
    border-left-width: 4px
}

.border-t-2 {
    border-top-width: 2px
}

.border-solid {
    border-style: solid
}

.border-dashed {
    border-style: dashed
}

.border-none {
    border-style: none
}

.border-gray-300 {
    --tw-border-opacity: 1;
    border-color: rgba(209, 213, 219, var(--tw-border-opacity))
}

.border-gray {
    --tw-border-opacity: 1;
    border-color: rgba(42, 45, 62, var(--tw-border-opacity))
}

.border-primary {
    --tw-border-opacity: 1;
    border-color: rgba(0, 184, 127, var(--tw-border-opacity))
}

.border-transparent {
    border-color: transparent
}

.border-gray-dark {
    --tw-border-opacity: 1;
    border-color: rgba(26, 28, 41, var(--tw-border-opacity))
}

.border-indigo-400 {
    --tw-border-opacity: 1;
    border-color: rgba(129, 140, 248, var(--tw-border-opacity))
}

.border-green-400 {
    --tw-border-opacity: 1;
    border-color: rgba(52, 211, 153, var(--tw-border-opacity))
}

.border-red-400 {
    --tw-border-opacity: 1;
    border-color: rgba(248, 113, 113, var(--tw-border-opacity))
}

.border-red-600 {
    --tw-border-opacity: 1;
    border-color: rgba(220, 38, 38, var(--tw-border-opacity))
}

.border-gray-800 {
    --tw-border-opacity: 1;
    border-color: rgba(31, 41, 55, var(--tw-border-opacity))
}

.border-green-500 {
    --tw-border-opacity: 1;
    border-color: rgba(16, 185, 129, var(--tw-border-opacity))
}

.border-gray-darker {
    --tw-border-opacity: 1;
    border-color: rgba(74, 78, 103, var(--tw-border-opacity))
}

.bg-white {
    --tw-bg-opacity: 1;
    background-color: rgba(255, 255, 255, var(--tw-bg-opacity))
}

.bg-gray {
    --tw-bg-opacity: 1;
    background-color: #1D2A39
}

.bg-gray-800 {
    --tw-bg-opacity: 1;
    background-color: rgba(31, 41, 55, var(--tw-bg-opacity))
}

.bg-indigo-50 {
    --tw-bg-opacity: 1;
    background-color: rgba(238, 242, 255, var(--tw-bg-opacity))
}

.bg-green-300 {
    --tw-bg-opacity: 1;
    background-color: rgba(110, 231, 183, var(--tw-bg-opacity))
}

.bg-red-300 {
    --tw-bg-opacity: 1;
    background-color: rgba(252, 165, 165, var(--tw-bg-opacity))
}

.bg-gray-darker {
    --tw-bg-opacity: 1;
    background-color: rgba(17, 19, 31, var(--tw-bg-opacity))
}

.bg-gray-dark {
    --tw-bg-opacity: 1;
    background-color: rgba(26, 28, 41, var(--tw-bg-opacity))
}

.bg-\[\#7389DA\] {
    --tw-bg-opacity: 1;
    background-color: rgba(115, 137, 218, var(--tw-bg-opacity))
}

.bg-gray-200 {
    --tw-bg-opacity: 1;
    background-color: rgba(229, 231, 235, var(--tw-bg-opacity))
}

.bg-indigo-400 {
    --tw-bg-opacity: 1;
    background-color: rgba(129, 140, 248, var(--tw-bg-opacity))
}

.bg-blue-400 {
    --tw-bg-opacity: 1;
    background-color: rgba(96, 165, 250, var(--tw-bg-opacity))
}

.bg-green-400 {
    --tw-bg-opacity: 1;
    background-color: rgba(52, 211, 153, var(--tw-bg-opacity))
}

.bg-gray-600 {
    --tw-bg-opacity: 1;
    background-color: rgba(75, 85, 99, var(--tw-bg-opacity))
}

.bg-green-800 {
    --tw-bg-opacity: 1;
    background-color: rgba(6, 95, 70, var(--tw-bg-opacity))
}

.bg-primary {
    --tw-bg-opacity: 1;
    background-color: rgba(0, 184, 127, var(--tw-bg-opacity))
}

.bg-secondary {
    --tw-bg-opacity: 1;
    background-color: rgba(67, 165, 255, var(--tw-bg-opacity))
}

.bg-gray-alt {
    --tw-bg-opacity: 1;
    background-color: rgba(33, 35, 50, var(--tw-bg-opacity))
}

.bg-gradient-to-r {
    background-image: linear-gradient(to right, var(--tw-gradient-stops))
}

.bg-placeholder {
    background-image: url(/images/nft-placeholder.svg?60a7b921cf93c14c75da2a1b48dda96a)
}

.from-yellow {
    --tw-gradient-from: #ffb636;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(255, 182, 54, 0))
}

.to-red {
    --tw-gradient-to: #ff473e
}

.bg-clip-padding {
    background-clip: padding-box
}

.bg-center {
    background-position: 50%
}

.bg-no-repeat {
    background-repeat: no-repeat
}

.fill-current {
    fill: currentColor
}

.object-cover {
    -o-object-fit: cover;
    object-fit: cover
}

.p-\[2px\] {
    padding: 2px
}

.p-px {
    padding: 1px
}

.p-2 {
    padding: .5rem
}

.p-4 {
    padding: 1rem
}

.p-3 {
    padding: .75rem
}

.p-6 {
    padding: 1.5rem
}

.p-8 {
    padding: 2rem
}

.p-10 {
    padding: 2.5rem
}

.p-0 {
    padding: 0
}

.px-4 {
    padding-left: 1rem;
    padding-right: 1rem
}

.py-2 {
    padding-bottom: .5rem;
    padding-top: .5rem
}

.px-2 {
    padding-left: .5rem;
    padding-right: .5rem
}

.py-8 {
    padding-bottom: 2rem;
    padding-top: 2rem
}

.px-8 {
    padding-left: 2rem;
    padding-right: 2rem
}

.py-5 {
    padding-bottom: 1.25rem;
    padding-top: 1.25rem
}

.py-3 {
    padding-bottom: .75rem;
    padding-top: .75rem
}

.py-1 {
    padding-bottom: .25rem;
    padding-top: .25rem
}

.px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem
}

.px-3 {
    padding-left: .75rem;
    padding-right: .75rem
}

.py-1\.5 {
    padding-bottom: .375rem;
    padding-top: .375rem
}

.px-1 {
    padding-left: .25rem;
    padding-right: .25rem
}

.py-6 {
    padding-bottom: 1.5rem;
    padding-top: 1.5rem
}

.pb-4 {
    padding-bottom: 1rem
}

.pr-6 {
    padding-right: 1.5rem
}

.pr-3 {
    padding-right: .75rem
}

.pl-2 {
    padding-left: .5rem
}

.pl-6 {
    padding-left: 1.5rem
}

.pl-3 {
    padding-left: .75rem
}

.pr-4 {
    padding-right: 1rem
}

.pr-12 {
    padding-right: 3rem
}

.pt-5 {
    padding-top: 1.25rem
}

.pt-12 {
    padding-top: 3rem
}

.pb-10 {
    padding-bottom: 2.5rem
}

.pl-4 {
    padding-left: 1rem
}

.pr-32 {
    padding-right: 8rem
}

.pl-8 {
    padding-left: 2rem
}

.pt-20 {
    padding-top: 5rem
}

.pr-1 {
    padding-right: .25rem
}

.pl-1 {
    padding-left: .25rem
}

.pr-8 {
    padding-right: 2rem
}

.pr-2 {
    padding-right: .5rem
}

.pb-2 {
    padding-bottom: .5rem
}

.pt-6 {
    padding-top: 1.5rem
}

.pt-2 {
    padding-top: .5rem
}

.pt-3 {
    padding-top: .75rem
}

.pb-3 {
    padding-bottom: .75rem
}

.pt-8 {
    padding-top: 2rem
}

.pb-full {
    padding-bottom: 100%
}

.pt-10 {
    padding-top: 2.5rem
}

.pt-4 {
    padding-top: 1rem
}

.pr-5 {
    padding-right: 1.25rem
}

.pb-6 {
    padding-bottom: 1.5rem
}

.pt-1 {
    padding-top: .25rem
}

.text-left {
    text-align: left
}

.text-center {
    text-align: center
}

.text-right {
    text-align: right
}

.font-sans {
    font-family: Poppins, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji
}

.text-sm {
    font-size: .875rem;
    line-height: 1.25rem
}

.text-lg {
    font-size: 1.125rem;
    line-height: 1.75rem
}

.text-base {
    font-size: 1rem;
    line-height: 1.5rem
}

.text-xl {
    font-size: 1.25rem;
    line-height: 1.75rem
}

.text-2xl {
    font-size: 1.5rem;
    line-height: 2rem
}

.text-4xl {
    font-size: 2.25rem;
    line-height: 2.5rem
}

.text-xs {
    font-size: .75rem;
    line-height: 1rem
}

.text-xxs {
    font-size: .63rem
}

.text-3xl {
    font-size: 1.875rem;
    line-height: 2.25rem
}

.font-bold, .font-medium {
    font-weight: 500
}

.font-semibold {
    font-weight: 600
}

.font-normal {
    font-weight: 400
}

.uppercase {
    text-transform: uppercase
}

.capitalize {
    text-transform: capitalize
}

.leading-5 {
    line-height: 1.25rem
}

.leading-none {
    line-height: 1
}

.leading-4 {
    line-height: 1rem
}

.leading-7 {
    line-height: 1.75rem
}

.tracking-widest {
    letter-spacing: .1em
}

.text-gray-500 {
    --tw-text-opacity: 1;
    color: rgba(107, 114, 128, var(--tw-text-opacity))
}

.text-gray-700 {
    --tw-text-opacity: 1;
    color: rgba(55, 65, 81, var(--tw-text-opacity))
}

.text-primary {
    --tw-text-opacity: 1;
    color: rgba(0, 184, 127, var(--tw-text-opacity))
}

.text-gray-light {
    --tw-text-opacity: 1;
    color: rgba(153, 155, 166, var(--tw-text-opacity))
}

.text-white {
    --tw-text-opacity: 1;
    color: rgba(255, 255, 255, var(--tw-text-opacity))
}

.text-green {
    --tw-text-opacity: 1;
    color: rgba(0, 184, 127, var(--tw-text-opacity))
}

.text-secondary {
    --tw-text-opacity: 1;
    color: rgba(67, 165, 255, var(--tw-text-opacity))
}

.text-indigo-600 {
    --tw-text-opacity: 1;
    color: rgba(79, 70, 229, var(--tw-text-opacity))
}

.text-green-600 {
    --tw-text-opacity: 1;
    color: rgba(5, 150, 105, var(--tw-text-opacity))
}

.text-gray-600 {
    --tw-text-opacity: 1;
    color: rgba(75, 85, 99, var(--tw-text-opacity))
}

.text-red-600 {
    --tw-text-opacity: 1;
    color: rgba(220, 38, 38, var(--tw-text-opacity))
}

.text-indigo-700 {
    --tw-text-opacity: 1;
    color: rgba(67, 56, 202, var(--tw-text-opacity))
}

.text-green-800 {
    --tw-text-opacity: 1;
    color: rgba(6, 95, 70, var(--tw-text-opacity))
}

.text-red-800 {
    --tw-text-opacity: 1;
    color: rgba(153, 27, 27, var(--tw-text-opacity))
}

.text-gray-900 {
    --tw-text-opacity: 1;
    color: rgba(17, 24, 39, var(--tw-text-opacity))
}

.text-black {
    --tw-text-opacity: 1;
    color: rgba(0, 0, 0, var(--tw-text-opacity))
}

.text-gray-200 {
    --tw-text-opacity: 1;
    color: rgba(229, 231, 235, var(--tw-text-opacity))
}

.text-gray-400 {
    --tw-text-opacity: 1;
    color: rgba(156, 163, 175, var(--tw-text-opacity))
}

.text-gray-300 {
    --tw-text-opacity: 1;
    color: rgba(209, 213, 219, var(--tw-text-opacity))
}

.underline {
    text-decoration: underline
}

.no-underline {
    text-decoration: none
}

.antialiased {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale
}

.opacity-0 {
    opacity: 0
}

.opacity-100 {
    opacity: 1
}

.opacity-40 {
    opacity: .4
}

.shadow-sm {
    --tw-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05)
}

.shadow-lg, .shadow-sm {
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
}

.shadow-lg {
    --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)
}

.shadow-md {
    --tw-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)
}

.shadow, .shadow-md {
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
}

.shadow {
    --tw-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)
}

.outline-none {
    outline: 2px solid transparent;
    outline-offset: 2px
}

.ring-1 {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color)
}

.ring-0, .ring-1 {
    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
}

.ring-0 {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(var(--tw-ring-offset-width)) var(--tw-ring-color)
}

.ring-gray-300 {
    --tw-ring-opacity: 1;
    --tw-ring-color: rgba(209, 213, 219, var(--tw-ring-opacity))
}

.ring-black {
    --tw-ring-opacity: 1;
    --tw-ring-color: rgba(0, 0, 0, var(--tw-ring-opacity))
}

.ring-opacity-5 {
    --tw-ring-opacity: 0.05
}

.blur {
    --tw-blur: blur(8px)
}

.blur, .filter {
    filter: var(--tw-filter)
}

.transition {
    transition-duration: .15s;
    transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;
    transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
    transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
    transition-timing-function: cubic-bezier(.4, 0, .2, 1)
}

.transition-colors {
    transition-property: background-color, border-color, color, fill, stroke;
    transition-timing-function: cubic-bezier(.4, 0, .2, 1)
}

.duration-150, .transition-colors {
    transition-duration: .15s
}

.duration-200 {
    transition-duration: .2s
}

.duration-75 {
    transition-duration: 75ms
}

.duration-300 {
    transition-duration: .3s
}

.duration-100 {
    transition-duration: .1s
}

.ease-in-out {
    transition-timing-function: cubic-bezier(.4, 0, .2, 1)
}

.ease-out {
    transition-timing-function: cubic-bezier(0, 0, .2, 1)
}

.ease-in {
    transition-timing-function: cubic-bezier(.4, 0, 1, 1)
}

.slick-slider {
    -webkit-touch-callout: none;
    -webkit-tap-highlight-color: transparent;
    box-sizing: border-box;
    touch-action: pan-y;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -khtml-user-select: none
}

.slick-list, .slick-slider {
    display: block;
    position: relative
}

.slick-list {
    margin: 0;
    overflow: hidden;
    padding: 0
}

.slick-list:focus {
    outline: none
}

.slick-list.dragging {
    cursor: pointer;
    cursor: hand
}

.slick-slider .slick-list, .slick-slider .slick-track {
    transform: translateZ(0)
}

.slick-track {
    display: block;
    left: 0;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    top: 0
}

.slick-track:after, .slick-track:before {
    content: "";
    display: table
}

.slick-track:after {
    clear: both
}

.slick-loading .slick-track {
    visibility: hidden
}

.slick-slide {
    display: none;
    float: left;
    height: 100%;
    min-height: 1px
}

[dir=rtl] .slick-slide {
    float: right
}

.slick-slide img {
    display: block
}

.slick-slide.slick-loading img {
    display: none
}

.slick-slide.dragging img {
    pointer-events: none
}

.slick-initialized .slick-slide {
    display: block
}

.slick-loading .slick-slide {
    visibility: hidden
}

.slick-vertical .slick-slide {
    border: 1px solid transparent;
    display: block;
    height: auto
}

.slick-arrow.slick-hidden {
    display: none
}

.slick-slide {
    height: auto;
    margin: 0 10px
}

.slick-list {
    margin: 0 -10px
}

.slick-arrow {
    --tw-bg-opacity: 1;
    background-color: rgba(42, 45, 62, var(--tw-bg-opacity));
    border-radius: 9999px;
    height: 1.75rem;
    padding: 0;
    width: 1.75rem
}

@media (min-width: 640px) {
    .slick-arrow {
        height: 2rem;
        width: 2rem
    }
}

.slick-arrow {
    background-image: url(/images/chevron.svg?77fed6c0a4dac0b2ae550bf834bdd0b0);
    background-position: 50%;
    background-repeat: no-repeat
}

.slider .slick-arrow {
    position: absolute;
    top: -2.25rem
}

@media (min-width: 640px) {
    .slider .slick-arrow {
        top: -3rem
    }
}

.slick-arrow.slick-disabled {
    opacity: .5
}

.slick-prev {
    --tw-rotate: -180deg;
    transform: var(--tw-transform)
}

.slider .slick-prev {
    right: 2.25rem
}

@media (min-width: 640px) {
    .slider .slick-prev {
        right: 3rem
    }
}

.slick-next {
    right: 0
}

.slick-track {
    align-items: stretch;
    display: flex;
    margin-left: 0
}

.last-of-type\:border-b-0:last-of-type, .last\:border-b-0:last-child {
    border-bottom-width: 0
}

.hover\:-translate-y-1:hover {
    --tw-translate-y: -0.25rem;
    transform: var(--tw-transform)
}

.hover\:scale-102:hover {
    --tw-scale-x: 1.02;
    --tw-scale-y: 1.02;
    transform: var(--tw-transform)
}

.hover\:border-gray-300:hover {
    --tw-border-opacity: 1;
    border-color: rgba(209, 213, 219, var(--tw-border-opacity))
}

.hover\:bg-gray-700:hover {
    --tw-bg-opacity: 1;
    background-color: rgba(55, 65, 81, var(--tw-bg-opacity))
}

.hover\:bg-gray-100:hover {
    --tw-bg-opacity: 1;
    background-color: rgba(243, 244, 246, var(--tw-bg-opacity))
}

.hover\:bg-gray-50:hover {
    --tw-bg-opacity: 1;
    background-color: rgba(249, 250, 251, var(--tw-bg-opacity))
}

.hover\:bg-gray-alt:hover {
    --tw-bg-opacity: 1;
    background-color: rgba(33, 35, 50, var(--tw-bg-opacity))
}

.hover\:text-gray-500:hover {
    --tw-text-opacity: 1;
    color: rgba(107, 114, 128, var(--tw-text-opacity))
}

.hover\:text-gray-400:hover {
    --tw-text-opacity: 1;
    color: rgba(156, 163, 175, var(--tw-text-opacity))
}

.hover\:text-gray-900:hover {
    --tw-text-opacity: 1;
    color: rgba(17, 24, 39, var(--tw-text-opacity))
}

.hover\:text-gray-800:hover {
    --tw-text-opacity: 1;
    color: rgba(31, 41, 55, var(--tw-text-opacity))
}

.hover\:text-white:hover {
    --tw-text-opacity: 1;
    color: rgba(255, 255, 255, var(--tw-text-opacity))
}

.hover\:underline:hover {
    text-decoration: underline
}

.focus\:z-10:focus {
    z-index: 10
}

.focus\:border-none:focus {
    border-style: none
}

.focus\:border-blue-300:focus {
    --tw-border-opacity: 1;
    border-color: rgba(147, 197, 253, var(--tw-border-opacity))
}

.focus\:border-indigo-300:focus {
    --tw-border-opacity: 1;
    border-color: rgba(165, 180, 252, var(--tw-border-opacity))
}

.focus\:border-gray-900:focus {
    --tw-border-opacity: 1;
    border-color: rgba(17, 24, 39, var(--tw-border-opacity))
}

.focus\:border-indigo-700:focus {
    --tw-border-opacity: 1;
    border-color: rgba(67, 56, 202, var(--tw-border-opacity))
}

.focus\:border-gray-300:focus {
    --tw-border-opacity: 1;
    border-color: rgba(209, 213, 219, var(--tw-border-opacity))
}

.focus\:bg-gray-100:focus {
    --tw-bg-opacity: 1;
    background-color: rgba(243, 244, 246, var(--tw-bg-opacity))
}

.focus\:bg-indigo-100:focus {
    --tw-bg-opacity: 1;
    background-color: rgba(224, 231, 255, var(--tw-bg-opacity))
}

.focus\:bg-gray-50:focus {
    --tw-bg-opacity: 1;
    background-color: rgba(249, 250, 251, var(--tw-bg-opacity))
}

.focus\:bg-gray-300:focus {
    --tw-bg-opacity: 1;
    background-color: rgba(209, 213, 219, var(--tw-bg-opacity))
}

.focus\:bg-gray-800:focus {
    --tw-bg-opacity: 1;
    background-color: rgba(31, 41, 55, var(--tw-bg-opacity))
}

.focus\:text-indigo-800:focus {
    --tw-text-opacity: 1;
    color: rgba(55, 48, 163, var(--tw-text-opacity))
}

.focus\:text-gray-800:focus {
    --tw-text-opacity: 1;
    color: rgba(31, 41, 55, var(--tw-text-opacity))
}

.focus\:text-gray-700:focus {
    --tw-text-opacity: 1;
    color: rgba(55, 65, 81, var(--tw-text-opacity))
}

.focus\:outline-none:focus {
    outline: 2px solid transparent;
    outline-offset: 2px
}

.focus\:ring:focus {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color)
}

.focus\:ring-0:focus, .focus\:ring:focus {
    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
}

.focus\:ring-0:focus {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(var(--tw-ring-offset-width)) var(--tw-ring-color)
}

.focus\:ring-2:focus {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
}

.focus\:ring-indigo-200:focus {
    --tw-ring-opacity: 1;
    --tw-ring-color: rgba(199, 210, 254, var(--tw-ring-opacity))
}

.focus\:ring-blue-500:focus {
    --tw-ring-opacity: 1;
    --tw-ring-color: rgba(59, 130, 246, var(--tw-ring-opacity))
}

.focus\:ring-opacity-50:focus {
    --tw-ring-opacity: 0.5
}

.focus\:ring-offset-2:focus {
    --tw-ring-offset-width: 2px
}

.active\:bg-gray-100:active {
    --tw-bg-opacity: 1;
    background-color: rgba(243, 244, 246, var(--tw-bg-opacity))
}

.active\:bg-gray-900:active {
    --tw-bg-opacity: 1;
    background-color: rgba(17, 24, 39, var(--tw-bg-opacity))
}

.active\:text-gray-700:active {
    --tw-text-opacity: 1;
    color: rgba(55, 65, 81, var(--tw-text-opacity))
}

.active\:text-gray-500:active {
    --tw-text-opacity: 1;
    color: rgba(107, 114, 128, var(--tw-text-opacity))
}

.disabled\:opacity-25:disabled {
    opacity: .25
}

.group:hover .group-hover\:block {
    display: block
}

@media (min-width: 400px) {
    .xs\:block {
        display: block
    }

    .xs\:hidden {
        display: none
    }
}

@media (min-width: 640px) {
    .sm\:relative {
        position: relative
    }

    .sm\:col-span-2 {
        grid-column: span 2/span 2
    }

    .sm\:col-span-6 {
        grid-column: span 6/span 6
    }

    .sm\:mr-12 {
        margin-right: 3rem
    }

    .sm\:mb-0 {
        margin-bottom: 0
    }

    .sm\:mt-0 {
        margin-top: 0
    }

    .sm\:mr-10 {
        margin-right: 2.5rem
    }

    .sm\:mb-6 {
        margin-bottom: 1.5rem
    }

    .sm\:mt-px {
        margin-top: 1px
    }

    .sm\:mt-5 {
        margin-top: 1.25rem
    }

    .sm\:block {
        display: block
    }

    .sm\:flex {
        display: flex
    }

    .sm\:grid {
        display: grid
    }

    .sm\:hidden {
        display: none
    }

    .sm\:h-full {
        height: 100%
    }

    .sm\:w-40 {
        width: 10rem
    }

    .sm\:w-2\/5 {
        width: 40%
    }

    .sm\:w-5\/12 {
        width: 41.666667%
    }

    .sm\:w-7\/12 {
        width: 58.333333%
    }

    .sm\:w-1\/3 {
        width: 33.333333%
    }

    .sm\:w-2\/3 {
        width: 66.666667%
    }

    .sm\:min-w-\[7rem\] {
        min-width: 7rem
    }

    .sm\:max-w-md {
        max-width: 28rem
    }

    .sm\:max-w-3xl {
        max-width: 48rem
    }

    .sm\:flex-1 {
        flex: 1 1 0%
    }

    .sm\:flex-grow {
        flex-grow: 1
    }

    .sm\:translate-x-0 {
        --tw-translate-x: 0px;
        transform: var(--tw-transform)
    }

    .sm\:grid-cols-2 {
        grid-template-columns:repeat(2, minmax(0, 1fr))
    }

    .sm\:grid-cols-3 {
        grid-template-columns:repeat(3, minmax(0, 1fr))
    }

    .sm\:grid-cols-6 {
        grid-template-columns:repeat(6, minmax(0, 1fr))
    }

    .sm\:flex-row {
        flex-direction: row
    }

    .sm\:items-start {
        align-items: flex-start
    }

    .sm\:items-end {
        align-items: flex-end
    }

    .sm\:items-center {
        align-items: center
    }

    .sm\:justify-center {
        justify-content: center
    }

    .sm\:justify-between {
        justify-content: space-between
    }

    .sm\:gap-10 {
        gap: 2.5rem
    }

    .sm\:gap-8 {
        gap: 2rem
    }

    .sm\:gap-4 {
        gap: 1rem
    }

    .sm\:gap-x-5 {
        -moz-column-gap: 1.25rem;
        column-gap: 1.25rem
    }

    .sm\:space-y-5 > :not([hidden]) ~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-bottom: calc(1.25rem * var(--tw-space-y-reverse));
        margin-top: calc(1.25rem * (1 - var(--tw-space-y-reverse)))
    }

    .sm\:rounded-lg {
        border-radius: .5rem
    }

    .sm\:bg-transparent {
        background-color: transparent
    }

    .sm\:p-3 {
        padding: .75rem
    }

    .sm\:px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem
    }

    .sm\:py-10 {
        padding-bottom: 2.5rem;
        padding-top: 2.5rem
    }

    .sm\:px-3 {
        padding-left: .75rem;
        padding-right: .75rem
    }

    .sm\:pr-5 {
        padding-right: 1.25rem
    }

    .sm\:pl-5 {
        padding-left: 1.25rem
    }

    .sm\:pl-3 {
        padding-left: .75rem
    }

    .sm\:pt-3 {
        padding-top: .75rem
    }

    .sm\:pt-2 {
        padding-top: .5rem
    }

    .sm\:text-left {
        text-align: left
    }

    .sm\:text-lg {
        font-size: 1.125rem;
        line-height: 1.75rem
    }

    .sm\:text-sm {
        font-size: .875rem;
        line-height: 1.25rem
    }

    .sm\:text-xs {
        font-size: .75rem;
        line-height: 1rem
    }

    .sm\:text-base {
        font-size: 1rem;
        line-height: 1.5rem
    }

    .sm\:text-gray-light {
        --tw-text-opacity: 1;
        color: rgba(153, 155, 166, var(--tw-text-opacity))
    }
}

@media (min-width: 768px) {
    .md\:top-7 {
        top: 1.75rem
    }

    .md\:order-first {
        order: -9999
    }

    .md\:mb-8 {
        margin-bottom: 2rem
    }

    .md\:mb-20 {
        margin-bottom: 5rem
    }

    .md\:mb-6 {
        margin-bottom: 1.5rem
    }

    .md\:mt-4 {
        margin-top: 1rem
    }

    .md\:mr-3 {
        margin-right: .75rem
    }

    .md\:mt-0 {
        margin-top: 0
    }

    .md\:mb-10 {
        margin-bottom: 2.5rem
    }

    .md\:flex {
        display: flex
    }

    .md\:hidden {
        display: none
    }

    .md\:max-h-80 {
        max-height: 20rem
    }

    .md\:w-full {
        width: 100%
    }

    .md\:w-1\/2 {
        width: 50%
    }

    .md\:w-2\/12 {
        width: 16.666667%
    }

    .md\:w-3\/12 {
        width: 25%
    }

    .md\:w-5\/12 {
        width: 41.666667%
    }

    .md\:w-10\/12 {
        width: 83.333333%
    }

    .md\:min-w-20 {
        min-width: 20rem
    }

    .md\:min-w-\[80\%\] {
        min-width: 80%
    }

    .md\:flex-1 {
        flex: 1 1 0%
    }

    .md\:flex-grow {
        flex-grow: 1
    }

    .md\:translate-x-0 {
        --tw-translate-x: 0px;
        transform: var(--tw-transform)
    }

    .md\:grid-cols-3 {
        grid-template-columns:repeat(3, minmax(0, 1fr))
    }

    .md\:grid-cols-2 {
        grid-template-columns:repeat(2, minmax(0, 1fr))
    }

    .md\:items-end {
        align-items: flex-end
    }

    .md\:justify-end {
        justify-content: flex-end
    }

    .md\:space-x-8 > :not([hidden]) ~ :not([hidden]) {
        --tw-space-x-reverse: 0;
        margin-left: calc(2rem * (1 - var(--tw-space-x-reverse)));
        margin-right: calc(2rem * var(--tw-space-x-reverse))
    }

    .md\:border-t {
        border-top-width: 1px
    }

    .md\:px-8 {
        padding-left: 2rem;
        padding-right: 2rem
    }

    .md\:px-3 {
        padding-left: .75rem;
        padding-right: .75rem
    }

    .md\:py-2 {
        padding-bottom: .5rem;
        padding-top: .5rem
    }

    .md\:px-10 {
        padding-left: 2.5rem;
        padding-right: 2.5rem
    }

    .md\:pl-4 {
        padding-left: 1rem
    }

    .md\:pl-72 {
        padding-left: 18rem
    }

    .md\:pr-8 {
        padding-right: 2rem
    }

    .md\:pl-5 {
        padding-left: 1.25rem
    }

    .md\:pl-10 {
        padding-left: 2.5rem
    }

    .md\:pr-10 {
        padding-right: 2.5rem
    }

    .md\:pb-1 {
        padding-bottom: .25rem
    }

    .md\:text-center {
        text-align: center
    }

    .md\:text-base {
        font-size: 1rem;
        line-height: 1.5rem
    }

    .md\:text-xs {
        font-size: .75rem;
        line-height: 1rem
    }

    .md\:text-xl {
        font-size: 1.25rem;
        line-height: 1.75rem
    }

    .md\:text-sm {
        font-size: .875rem;
        line-height: 1.25rem
    }

    .md\:text-lg {
        font-size: 1.125rem;
        line-height: 1.75rem
    }
}

@media (min-width: 1024px) {
    .lg\:col-span-1 {
        grid-column: span 1/span 1
    }

    .lg\:col-auto {
        grid-column: auto
    }

    .lg\:mr-0 {
        margin-right: 0
    }

    .lg\:mb-0 {
        margin-bottom: 0
    }

    .lg\:mr-2 {
        margin-right: .5rem
    }

    .lg\:mb-1 {
        margin-bottom: .25rem
    }

    .lg\:mt-0 {
        margin-top: 0
    }

    .lg\:mb-10 {
        margin-bottom: 2.5rem
    }

    .lg\:ml-3 {
        margin-left: .75rem
    }

    .lg\:mt-12 {
        margin-top: 3rem
    }

    .lg\:block {
        display: block
    }

    .lg\:flex {
        display: flex
    }

    .lg\:hidden {
        display: none
    }

    .lg\:h-4 {
        height: 1rem
    }

    .lg\:w-4\/12 {
        width: 33.333333%
    }

    .lg\:w-8\/12 {
        width: 66.666667%
    }

    .lg\:w-1\/6 {
        width: 16.666667%
    }

    .lg\:w-full {
        width: 100%
    }

    .lg\:w-auto {
        width: auto
    }

    .lg\:w-3\/12 {
        width: 25%
    }

    .lg\:w-9\/12 {
        width: 75%
    }

    .lg\:min-w-\[9rem\] {
        min-width: 9rem
    }

    .lg\:flex-grow {
        flex-grow: 1
    }

    .lg\:grid-cols-3 {
        grid-template-columns:repeat(3, minmax(0, 1fr))
    }

    .lg\:grid-cols-4 {
        grid-template-columns:repeat(4, minmax(0, 1fr))
    }

    .lg\:grid-cols-footer {
        grid-template-columns:1fr 2fr 2fr
    }

    .lg\:grid-cols-7 {
        grid-template-columns:repeat(7, minmax(0, 1fr))
    }

    .lg\:flex-row {
        flex-direction: row
    }

    .lg\:flex-col {
        flex-direction: column
    }

    .lg\:flex-nowrap {
        flex-wrap: nowrap
    }

    .lg\:items-end {
        align-items: flex-end
    }

    .lg\:items-center {
        align-items: center
    }

    .lg\:justify-start {
        justify-content: flex-start
    }

    .lg\:justify-end {
        justify-content: flex-end
    }

    .lg\:justify-center {
        justify-content: center
    }

    .lg\:justify-between {
        justify-content: space-between
    }

    .lg\:gap-0 {
        gap: 0
    }

    .lg\:space-y-2 > :not([hidden]) ~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-bottom: calc(.5rem * var(--tw-space-y-reverse));
        margin-top: calc(.5rem * (1 - var(--tw-space-y-reverse)))
    }

    .lg\:border-0 {
        border-width: 0
    }

    .lg\:border-r {
        border-right-width: 1px
    }

    .lg\:border-t {
        border-top-width: 1px
    }

    .lg\:border-b {
        border-bottom-width: 1px
    }

    .lg\:border-b-2 {
        border-bottom-width: 2px
    }

    .lg\:px-8 {
        padding-left: 2rem;
        padding-right: 2rem
    }

    .lg\:px-16 {
        padding-left: 4rem;
        padding-right: 4rem
    }

    .lg\:px-10 {
        padding-left: 2.5rem;
        padding-right: 2.5rem
    }

    .lg\:py-3 {
        padding-bottom: .75rem;
        padding-top: .75rem
    }

    .lg\:pr-2 {
        padding-right: .5rem
    }

    .lg\:pb-0 {
        padding-bottom: 0
    }

    .lg\:pt-0 {
        padding-top: 0
    }

    .lg\:pt-2 {
        padding-top: .5rem
    }

    .lg\:pb-4 {
        padding-bottom: 1rem
    }

    .lg\:text-right {
        text-align: right
    }

    .lg\:text-4xl {
        font-size: 2.25rem;
        line-height: 2.5rem
    }

    .lg\:text-xs {
        font-size: .75rem;
        line-height: 1rem
    }

    .lg\:text-lg {
        font-size: 1.125rem;
        line-height: 1.75rem
    }

    .lg\:text-2xl {
        font-size: 1.5rem;
        line-height: 2rem
    }

    .lg\:text-3xl {
        font-size: 1.875rem;
        line-height: 2.25rem
    }

    .lg\:leading-6 {
        line-height: 1.5rem
    }
}

@media (min-width: 1280px) {
    .xl\:col-span-1 {
        grid-column: span 1/span 1
    }

    .xl\:mt-auto {
        margin-top: auto
    }

    .xl\:block {
        display: block
    }

    .xl\:hidden {
        display: none
    }

    .xl\:w-6\/12 {
        width: 50%
    }

    .xl\:w-7\/12 {
        width: 58.333333%
    }

    .xl\:min-w-\[70\%\] {
        min-width: 70%
    }

    .xl\:grid-cols-3 {
        grid-template-columns:repeat(3, minmax(0, 1fr))
    }

    .xl\:grid-cols-5 {
        grid-template-columns:repeat(5, minmax(0, 1fr))
    }

    .xl\:gap-10 {
        gap: 2.5rem
    }

    .xl\:text-6xl {
        font-size: 3.75rem;
        line-height: 1
    }

    .xl\:text-base {
        font-size: 1rem;
        line-height: 1.5rem
    }
}
</style>
<?php include "include/footer.php" ?>
</body>
</html>