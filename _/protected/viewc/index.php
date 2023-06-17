<!DOCTYPE html>
<html lang="pt br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Slim Care</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="<?php echo $data['globais']; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $data['globais']; ?>css/fontawesome-all.css" rel="stylesheet">
    <link href="<?php echo $data['globais']; ?>css/swiper.css" rel="stylesheet">
    <link href="<?php echo $data['globais']; ?>css/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo $data['globais']; ?>css/styles.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo $data['globais']; ?>images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Tivo</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="index.html" style="text-decoration: none;">Slim Care</a>

            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">INÍCIO<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#details">SERVIÇOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">SOBRE NÓS</a>
                    </li>
                </ul>
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <div class="text-container">
                            <img class="img-fluid" style="width: 85%;" src="<?php echo $data['globais']; ?>images/logo2.png" alt="alternative">
                            <p class="p-small" style="color: white;">Os cuidados pós-operatórios são imprescindíveis para o melhor resultado da sua cirurgia. Pensando nisso, a Slim Care oferece profissionais treinados, o conforto e a tranquilidade que você tanto necessita nesse momento. </p>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6 col-xl-7">
                        <div class="image-container">
                            <div class="img-wrapper">
                                <img class="img-fluid" style="width: 85%;" src="<?php echo $data['globais']; ?>images/header-software-app.svg" alt="alternative">
                            </div> <!-- end of img-wrapper -->
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 310">
        <defs>
            <style>
                .cls-1 {
                    fill: #B25474;
                }
            </style>
        </defs>
        <title>header-frame</title>
        <path class="cls-1" d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z" />
    </svg>
    <!-- end of header -->

    <!-- Description -->
    <div id='details' class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <div class="above-heading">Serviços</div> -->
                    <h2 class="h2-heading">Nossos serviços</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php echo $data['globais']; ?>images/description-1.svg" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Alimentação</h4>
                            <p>De acordo com a orientação do seu
                                médico, elaborado por nutricionista,
                                obedecendo todos os protocolos de
                                manipulação alimentar.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php echo $data['globais']; ?>images/description-2.svg" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Cuidadora</h4>
                            <p>Devidamente capacitada,
                                atendendo 24h por dia, 7 dias
                                por semana.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php echo $data['globais']; ?>images/description-3.svg" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Hospedagem</h4>
                            <p>Ambiente climatizado, poltronas
                                adequadas para o pós-operatório,
                                wi-fi, netflix, espaço social.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of description -->


    <!-- Features -->
    <div id="features" class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">Slim Care</div>
                    <h2 class="h2-heading">Cuidados pós-operatórios de cirurgia plástica</h2>
                    <p class="p-heading">Os cuidados pós-operatórios são imprescindíveis
                        para o melhor resultado da sua cirurgia.
                        Pensando nisso, a Slim Care oferece profissionais
                        treinados, o conforto e a tranquilidade que você
                        tanto necessita nesse momento. Será uma alegria
                        poder cuidar de você!</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Tabs Links -->
                    <ul class="nav nav-tabs" id="argoTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Bem Vindo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Ambiente Interno</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Ambiente Externo</a>
                        </li>
                    </ul>
                    <!-- end of tabs links -->

                    <!-- Tabs Content -->
                    <div class="tab-content" id="argoTabsContent">

                        <!-- Tab -->
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="<?php echo $data['globais']; ?>img/img1.png" alt="alternative">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="<?php echo $data['globais']; ?>img/img2.png" alt="alternative">
                                    </div> 
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->

                        <!-- Tab -->
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="<?php echo $data['globais']; ?>img/img12.png" alt="alternative">
                                    </div> <!-- end of image-container -->
                                    <div class="image-container">
                                        <img class="img-fluid" src="<?php echo $data['globais']; ?>img/img15.png" alt="alternative">
                                    </div> 
                                    <div class="image-container">
                                        <img class="img-fluid" src="<?php echo $data['globais']; ?>img/img9.png" alt="alternative">
                                    </div> <!-- end of image-container -->
                                    
                                </div> <!-- end of col -->
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="<?php echo $data['globais']; ?>img/img6.png" alt="alternative">
                                    </div> <!-- end of image-container -->
                                    <div class="image-container">
                                        <img class="img-fluid" src="<?php echo $data['globais']; ?>img/img14.png" alt="alternative">
                                    </div> 
                                    <div class="image-container">
                                        <img class="img-fluid" src="<?php echo $data['globais']; ?>img/img7.png" alt="alternative">
                                    </div> <!-- end of image-container -->
                                   
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->

                        <!-- Tab -->
                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="<?php echo $data['globais']; ?>img/img10.png" alt="alternative">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-6">
                                     <div class="image-container">
                                        <img class="img-fluid" src="<?php echo $data['globais']; ?>img/img11.png" alt="alternative">
                                    </div> <!-- end of image-container -->                                    
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->

                    </div> <!-- end of tab content -->
                    <!-- end of tabs content -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of tabs -->
    <!-- end of features -->


    <!-- Details Lightboxes -->
    <!-- Details Lightbox 1 -->
    <div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="<?php echo $data['globais']; ?>images/details-lightbox.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>List Building</h3>
                    <hr>
                    <h5>Core service</h5>
                    <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 1 -->

    <!-- Details Lightbox 2 -->
    <div id="details-lightbox-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="<?php echo $data['globais']; ?>images/details-lightbox.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Campaign Monitoring</h3>
                    <hr>
                    <h5>Core service</h5>
                    <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 2 --><!-- Copyright --> </div> <!-- end of col -->
    <!-- Footer -->
    <svg class="footer-frame" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 79">
        <defs>
            <style>
                .cls-2 {
                    fill: #B25474;
                }
            </style>
        </defs>
        <title>footer-frame</title>
        <path class="cls-2" d="M0,72.427C143,12.138,255.5,4.577,328.644,7.943c147.721,6.8,183.881,60.242,320.83,53.737,143-6.793,167.826-68.128,293-60.9,109.095,6.3,115.68,54.364,225.251,57.319,113.58,3.064,138.8-47.711,251.189-41.8,104.012,5.474,109.713,50.4,197.369,46.572,89.549-3.91,124.375-52.563,227.622-50.155A338.646,338.646,0,0,1,1920,23.467V79.75H0V72.427Z" transform="translate(0 -0.188)" />
    </svg>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-col first">
                        <h4>Slim Care</h4>
                        <p class="p-small">Conte conosco nesse momento especial da sua
                            vida! Qualquer dúvida é só perguntar.</p>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col middle">
                        <h4>Endereço</h4>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li class="media">
                                <i class="fas fa-map-marker"></i>
                                <div class="media-body">206 sul, alameda 02, lote 78 - Palmas/TO</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-map"></i>
                                <div class="media-body"><a class="white" target="_blank" href="https://goo.gl/maps/ktFevvEqR4tu5sHU9">Ver no Mapa</a></div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col last">
                        <h4>Contato</h4>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li class="media">
                                <i class="fab fa-whatsapp"></i>
                                <div class="media-body"><a class="white" href="https://api.whatsapp.com/send?phone=5563991258337&text=Ol%C3%A1,%20voc%C3%AA%20pode%20me%20ajudar?">(63) 99125-8337</a>
                            </li>
                            <li class="media">
                                <i class="fab fa-instagram"></i>
                                <div class="media-body"><a class="white" target="_blank" href="https://www.instagram.com/slimcarepalmasto">slimcarepalmasto</a>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
        <a href="https://storyset.com/" style="font-size: 10px;color: #b95d7c;">Illustrations by Storyset</a>
        
    </div> <!-- end of footer -->
    <!-- end of footer -->

    <!-- Scripts -->
    <script src="<?php echo $data['globais']; ?>js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="<?php echo $data['globais']; ?>js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="<?php echo $data['globais']; ?>js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="<?php echo $data['globais']; ?>js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="<?php echo $data['globais']; ?>js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="<?php echo $data['globais']; ?>js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="<?php echo $data['globais']; ?>js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="<?php echo $data['globais']; ?>js/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>