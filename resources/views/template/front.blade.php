<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />

    <title>@yield('title') - Manga Origines</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" href="/images/static/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @toastr_css

</head>

<body class="{{ Cookie::get('theme-mode') }}">
    <header class="header">
        <div class="container">
            <div class="header__logo">
                <a href="{{ route('home') }}">
                    <img src="/images/static/logo.png" alt="Manga Origine">
                </a>
            </div>
            <nav class="header__menu">
                <ul>
                    <li class="header__menu__link">
                        <span class="header__menu__link__icon home"></span>
                        <a href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li class="header__menu__link">
                        <span class="header__menu__link__icon menu"></span>
                        <a href="{{ route('static.catalog') }}">Catalogue</a>
                    </li>
                    <li class="header__menu__link">
                        <span class="header__menu__link__icon vip"></span>
                        <a href="{{ route('static.vip') }}">Vip</a>
                    </li>
                    <li class="header__menu__link">
                        <span class="header__menu__link__icon contact"></span>
                        <a href="{{ route('static.contact') }}">Nous contacter</a>
                    </li>
                </ul>
            </nav>
            <div class="header__tools">
                <div class="header__tools__search">
                    <span class="search-icon"></span>
                    <input type="text" placeholder="Tapez votre recherche...">
                    <button type="submit" class="search-submit">Go</button>
                </div>
                <span id="change-mode" class="change-mode {{ Cookie::get('theme-mode') }}"></span>
                <div class="header__tools__account">
                    @if(Auth::guest())
                        <a href="{{ route('login') }}">
                            <img src="/images/static/login.png">
                        </a>
                    @else 
                        <a id="account" href="#">
                            <img src="/images/static/login.png">
                        </a>
                        <div class="account">
                            <div class="account__profile">
                                <img src="/images/static/login.png" class="account__profile__avatar" alt="{{ Auth::user()->username }}">
                                <ul class="account__profile__infos">    
                                    <li>{{ Auth::user()->username }}</li>
                                    <li>Administrateur</li>
                                </ul>
                            </div>
                            <ul class="account__menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user"></i>
                                        <span>Mon compte</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-bookmark"></i>
                                        <span>Mes favoris</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-history"></i>
                                        <span>Historique</span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#">
                                        <i class="fa fa-user"></i>
                                        <span>ACP</span>
                                    </a>
                                </li> --}}
                            </ul>
                            <a href="{{ route('auth.logout') }}" class="account__logout"><i class="fa fa-lock"></i> Se déconnecter</a>
                        </div>
                    @endif
                </div>
            </div>  
        </div>
    </header>

    <div class="header-spacer"></div>

    @yield('content')

    <footer class="footer">
        <img class="footer__logo" src="/images/static/logo.png" alt="Manga Origine">
        <div class="footer__infos">
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="#">Catalogue</a></li>
                <li><a href="{{ route('static.contact') }}">Nous contacter</a></li>
                <li><a href="{{ route('static.legal.privacy') }}">Politique de confidentialité</a></li>
                <li><a href="{{ route('static.discord') }}">Discord</a></li>
            </ul>
            <p class="footer__infos__copyright">2021 | Origines Corporation - tout droits réservés. | Design by <a href="#">King</a> & Code by <a href="Discord::Nitram#1234">Nitram</a></p>
        </div>
    </footer>

    <script src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $('.tendances__slider').slick({
            centerMode: true,
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            prevArrow: $(".block__title__controls__prev"),
            nextArrow: $(".block__title__controls__next"),
            dots: false,
        });

         $('.recents__slider').slick({
            centerMode: true,
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            prevArrow: $(".block__title__controls__prev"),
            nextArrow: $(".block__title__controls__next"),
            dots: false,
        });

        $('.news__slider').slick({
            centerMode: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: $(".block__title__controls__prev"),
            nextArrow: $(".block__title__controls__next"),
            dots: false,
        });

        $('.exclusives__slider').slick({
            centerMode: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: $(".block__title__controls__prev"),
            nextArrow: $(".block__title__controls__next"),
            dots: false,
        });

        $("#home-slider").slick({
            centerMode: true,
             centerPadding: '0px',
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: $(".home-slider__arrow-prev"),
            nextArrow: $(".home-slider__arrow-next"),
            dots: true,
            autoplay: true,
            speed: 500,
            autoplaySpeed: 2000,
            cssEase: "linear",
            pauseOnHover: true,
            swipeToSlide: false,
        });

        $("#change-mode").click(function() {
            
            var value = $("body").hasClass("light") ? "dark" : "light";
            $("body").toggleClass("dark");
            $.get("/cookie/change-mode/" + value);
        });

        $("#account").click(function() {

            $(".account").toggleClass("show");
        });
    </script>

    @toastr_js
    @toastr_render

    @stack('scripts')

</body>

</html>