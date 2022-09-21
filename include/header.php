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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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

.img-fluid{
        height:250px;
    } 

    .samples {
	 display: flex;
	 flex-wrap: wrap;
	 max-width: 480px;
}

 .ribbon {
	 position: absolute;
	 right: var(--right, 10px);
	 top: var(--top, -3px);
	 filter: drop-shadow(2px 3px 2px rgba(0, 0, 0, 0.5));
}
 .ribbon > .content {
	 color: white;
	 font-size: 1.25rem;
	 text-align: center;
	 font-weight: 400;
	 background: var(--color, #008AFF) linear-gradient(45deg, rgba(0, 0, 0, 0) 0%, rgba(255, 255, 255, 0.25) 100%);
	 padding: 8px 2px 4px;
	 clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 100%, 0 100%);
	 width: var(--width, 32px);
	 min-height: var(--height, 36px);
	 transition: clip-path 1s, padding 1s, background 1s;
}
 .ribbon.slant-up > .content {
	 clip-path: polygon(0 0, 100% 0, 100% calc(100% - 12px), 50% calc(100% - 6px), 0 100%);
}
 .ribbon.slant-down > .content {
	 clip-path: polygon(0 0, 100% 0, 100% 100%, 50% calc(100% - 6px), 0 calc(100% - 12px));
}
 .ribbon.down > .content {
	 clip-path: polygon(0 0, 100% 0, 100% calc(100% - 8px), 50% 100%, 0 calc(100% - 8px));
}
 .ribbon.up > .content {
	 clip-path: polygon(0 0, 100% 0, 100% 100%, 50% calc(100% - 8px), 0 100%);
}
 .ribbon.check > .content {
	 clip-path: polygon(0 0, 100% 0, 100% calc(100% - 20px), 40% 100%, 0 calc(100% - 12px));
}

                        /*SALE*/

 .ribbon-wrapper {
	position: relative;
	z-index:998;
}
  .ribbon-front {
	background-color: #008AFF;	height: 50px;
	width: 240px;
	position: relative;
	left:-10px;
	z-index: 2; 
	font:20px/50px bold nunito-sans, sans-serif; color:#f8f8f8; text-align:center;text-shadow: 0px 1px 2px #cc6666;
}

  .ribbon-front,
  .ribbon-back-left,
  .ribbon-back-right
{
	-moz-box-shadow: 0px 0px 4px rgba(0,0,0,0.55);
	-khtml-box-shadow: 0px 0px 4px rgba(0,0,0,0.55);
	-webkit-box-shadow: 0px 0px 4px rgba(0,0,0,0.55);
	-o-box-shadow: 0px 0px 4px rgba(0,0,0,0.55);
}

  .ribbon-edge-topleft,
  .ribbon-edge-topright,
  .ribbon-edge-bottomleft,
  .ribbon-edge-bottomright {
	position: absolute;
	z-index: 1;
	border-style:solid;
	height:0px;
	width:0px;
}

  .ribbon-edge-topleft,
  .ribbon-edge-topright {
}

  .ribbon-edge-bottomleft,
  .ribbon-edge-bottomright {
	top: 50px;
}

  .ribbon-edge-topleft,
  .ribbon-edge-bottomleft {
	left: -10px;
	border-color: transparent #008AFF transparent transparent;
}

  .ribbon-edge-topleft {
	top: -5px;
	border-width: 5px 10px 0 0;
}
  .ribbon-edge-bottomleft {
	border-width: 0 10px 0px 0;
}

  .ribbon-edge-topright,
  .ribbon-edge-bottomright {
	left: 220px;
	border-color: transparent transparent transparent #008AFF;
}

  .ribbon-edge-topright {
	top: 0px;
	border-width: 0px 0 0 10px;
}
  .ribbon-edge-bottomright {
	border-width: 0 0 5px 10px;
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
                                    <li style="display: none;" class="nav-item"><a class="nav-link" style="display: none;" href="listProject.php">List Project</a></li>
                                    <li style="display: none;" class="nav-item"><a class="nav-link" style="display: none;" href="listDrop.php">List Drop</a></li>   
                                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="exploreDrops.php">Drops </a></li>
                                    <li class="nav-item"><a class="nav-link" href="exploreProject.php">Projects</a></li>
                                    <li class="nav-item"><a class="nav-link" style="width: 95px;" href="prices.php">Our Prices</a></li>
                                    <!--<li class="nav-item"><a class="nav-link" style="width: 165px;" href="update.php">Update your project</a></li>-->
                                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                                    <li> <a class="btn btn-primary" id="project" href="listProject.php">List Project</a></li>
                                    <li> <a class="btn btn-primary" id="drop" href="listDrop.php">List Drop</a></li>
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