<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />

    <title>@yield('title') - Manga Origines</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" href="/images/static/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @toastr_css

</head>

<body>
    <!-- start block header  -->
    <header class="header">
        <div class="header__logo">
            <a href="{{ route('home') }}">
                <img src="/images/static/logo.png" alt="Manga Origine">
            </a>
        </div>
        <nav class="header__menu">
            <a href="#" class="header__menu__link fa fa-home">

            </a>
            <a href="#" class="header__menu__link fa fa-compass">
            </a>
            <a href="#" class="header__menu__link fa fa-book">
            </a>
        </nav>
        <div class="header__tools">
            <div class="header__tools__search">
                <div class="header__tools__search__form">
                </div>
                <a href="#" class="fa fa-search"></a>
            </div>
            <div class="header__tools__notifications">
                <a href="#" class="fa fa-bell"></a>
            </div>
            <div class="header__tools__account">
                @if(Auth::guest())
                    <a href="{{ route('login') }}">
                        <img src="/images/static/login.png">
                    </a>
                @endif
               
                {{-- <div class="header__tools__account__panel">
                    <a href="#">tesst</a>
                </div> --}}
            </div>
        </div>
    </header>
    <!-- end block header  -->

    <!-- start block lecture recente  -->
    <div class="block recent" id="recent">
        <div class="block__title recent">
            <h3>Lecture récente</h3>
            <div class="block__title__controls">
                <div class="block__title__controls__prev">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x c-white"></i>
                        <i class="fa fa-angle-left fa-stack-1x c-black"></i>
                    </span>
                </div>
                <div class="block__title__controls__next">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x c-white"></i>
                        <i class="fa fa-angle-right fa-stack-1x c-black"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="recent__slider">
            @for($i = 0; $i < 15; $i++) 
                <div class="recent__slider__slides" style="background: url('/images/front/cover.jpg');">
                    <div class="recent__slider__slides__text">
                        <div class="recent__slider__slides__text__title">
                            Solo Leveling
                        </div>
                        <div class="recent__slider__slides__text__chapter">
                            Chapitre {{ $i }}
                        </div>
                    </div>
                    <div class="recent__slider__slides__overlay"></div>
                </div>
            @endfor
        </div>
    </div>
    <!-- end block lecture recente  -->

    <div class="discover">
        <div class="discover__left">
            <div class="discover__left__top">
                <h3>Découvrir</h3>
            </div>
            <div class="discover__left__title">
                <h2>Tokyo Ghoul</h2>
            </div>
            <div class="discover__left__text">
                <p>Dans la ville de Tokyo, des créatures nommées goules sont apparues et se nourrissent de chair humaine pour survivre. Un jour, Ken Kaneki, jeune étudiant, se fait attaquer par l'une d'entre elles et subit une grave blessure. Pour rester en vie, il reçoit une greffe de la goule qui l'a attaqué et devient un hybride, mi-humain mi-goule (borgne artificielle). Rapidement, il se rend compte qu'il ne peut plus manger les mêmes aliments qu'auparavant. Il entre alors au service du café « L’Antique », un repaire de goules, où il apprend à se nourrir sans faire de mal aux humains. Mais il va bien vite se retrouver au cœur d'une guerre sanglante entre le CCG (Centre de Contrôle des Goules), déterminé à retrouver et exterminer celles-ci jusqu'à la dernière et l'Arbre Aogiri, une organisation de goules sans merci. Il découvre que les goules ne sont pas si différentes des humains, et peu à peu il va commencer à s'adapter.</p>
            </div>
        </div>
        <div class="discover__right">
            <div class="discover__right__image">
                <img src="/images/front/tokyo-ghoul.png">
            </div>
        </div>
    </div>



    <!-- start block top 4  -->
    <div class="block top-mangas" id="top-mangas">
        <div class="block__title top-4">
            <h3>Top 4</h3>
        </div>

        <div class="top-mangas__list">
            <div class="top-mangas__list__collumn">
                <a href="#">
                    <div class="top-mangas__list__item" style="background: url('/images/front/top-1.jpg');">
                        <span class="top-mangas__list__item__tag first">1</span>
                        <h4 class="top-mangas__list__item__title">THE BEGINNING AFTER THE END</h4>
                        <div class="top-mangas__list__item__overlay"></div>
                    </div>
                </a>
            </div>
            <div class="top-mangas__list__collumn">
                <a href="#">
                    <div class="top-mangas__list__item" style="background: url('/images/front/top-1.jpg');">
                        <span class="top-mangas__list__item__tag">2</span>
                        <h4 class="top-mangas__list__item__title">THE BEGINNING AFTER THE END</h4>
                        <div class="top-mangas__list__item__overlay"></div>
                    </div>
                </a>
            </div>
            <div class="top-mangas__list__collumn">
                <a href="#">
                    <div class="top-mangas__list__item item-egal" style="background: url('/images/front/top-1.jpg');">
                        <span class="top-mangas__list__item__tag">3</span>
                        <h4 class="top-mangas__list__item__title">THE BEGINNING AFTER THE END</h4>
                        <div class="top-mangas__list__item__overlay"></div>
                    </div>
                </a>
                <a href="#">
                    <div class="top-mangas__list__item item-egal" style="background: url('/images/front/top-1.jpg');">
                        <span class="top-mangas__list__item__tag">4</span>
                        <h4 class="top-mangas__list__item__title">THE BEGINNING AFTER THE END</h4>
                        <div class="top-mangas__list__item__overlay"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- end block top 4  -->



    <!-- start block sorties recentes  -->
    <div class="block recent" id="new">
        <div class="block__title new">
            <h3>Sorties récentes</h3>
            <div class="block__title__controls">
                <div class="block__title__controls__prev">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x c-white"></i>
                        <i class="fa fa-angle-left fa-stack-1x c-black"></i>
                    </span>
                </div>
                <div class="block__title__controls__next">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x c-white"></i>
                        <i class="fa fa-angle-right fa-stack-1x c-black"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="recent__slider">
            @for($i = 0; $i < 15; $i++) 
                <div class="recent__slider__slides" style="background: url('/images/front/cover.jpg');">
                    <div class="recent__slider__slides__text">
                        <div class="recent__slider__slides__text__title">
                            Solo Leveling
                        </div>
                        <div class="recent__slider__slides__text__chapter">
                            Chapitre {{ $i }}
                        </div>
                    </div>
                    <div class="recent__slider__slides__overlay"></div>
                </div>
            @endfor
        </div>

        <footer class="footer">
            <img class="footer__logo" src="/images/static/logo.png" alt="Manga Origine">
            <p class="footer__copyright">@2021 Origines Corporation, tous droits réservés.</p>
        </footer>
    </div>
    <!-- end block sorties recentes  -->

    <script src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $('.recent__slider').slick({
            centerMode: true,
            centerPadding: '40px',
            infinite: true,
            slidesToShow: 7,
            slidesToScroll: 1,
            prevArrow: $("#recent .block__title__controls__prev"),
            nextArrow: $("#recent .block__title__controls__next"),
            dots: false,
        });
    </script>

    @toastr_js
    @toastr_render

    @stack('scripts')

</body>

</html>