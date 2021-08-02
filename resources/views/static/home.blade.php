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

<body>
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
                        <a href="#">Accueil</a>
                    </li>
                    <li class="header__menu__link">
                        <span class="header__menu__link__icon menu"></span>
                        <a href="#">Catalogue</a>
                    </li>
                    <li class="header__menu__link">
                        <span class="header__menu__link__icon vip"></span>
                        <a href="#">Vip</a>
                    </li>
                    <li class="header__menu__link">
                        <span class="header__menu__link__icon contact"></span>
                        <a href="#">Nous contacter</a>
                    </li>
                </ul>
            </nav>
            <div class="header__tools">
                <div class="header__tools__search">
                    <span class="search-icon"></span>
                    <input type="text" placeholder="Tapez votre recherche...">
                    <button type="submit" class="search-submit">Go</button>
                </div>
                <div class="header__tools__account">
                    @if(Auth::guest())
                        <a href="{{ route('login') }}">
                            <img src="/images/static/login.png">
                        </a>
                    @endif
                </div>
            </div>  
        </div>
    </header>

    <div class="header-spacer"></div>


    <div class="container">
        <div class="home-slider">
            <div id="home-slider">
                @for($i = 0; $i < 5; $i++) 
                    <div class="home-slider__slide">
                        {{ $i }}
                    </div>
                @endfor
            </div>
        </div>

        <div class="home-categories">
            <ul>
                <li><a href="#" class="text-warning"><span class="hot-icon"></span> Hot</a></li>
                <li><a href="#" class="text-success">Webconic</a></li>
                <li><a href="#">Manhwa</a></li>
                <li><a href="#">Manhua</a></li>
                <li><a href="#">Mangas</a></li>
                <li><a href="#">Shonen</a></li>
                <li><a href="#">Fantasy</a></li>
                <li><a href="#">Adulte</a></li> 
                <li><a href="#">Romance</a></li>
                <li><a href="#" class="text-warning"><span class="menu-icon"></span> Catégories</a></li>
            </ul>
        </div>    

        <div class="block tendances" id="tendances" style="margin-top: 50px;">
            <div class="block__title tendances">
                <h3>Tendances</h3>
                <div class="block__title__controls">
                    <a href="#" class="block__title__controls__more">Voir plus</a>
                    <div class="block__title__controls__prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="block__title__controls__next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="tendances__slider">
                @for($i = 0; $i < 15; $i++) 
                    <div class="tendances__slider__slides" style="background: url('/images/front/cover.jpg');"></div>
                @endfor
            </div>
        </div>

        <img src="./images/static/ad.png" style="width: 100%; padding: 40px 0px;">

        <div class="block recents" id="recents">
            <div class="block__title recents">
                <h3>Derniers Ajouts</h3>
                <div class="block__title__controls">
                    <a href="#" class="block__title__controls__more">Voir plus</a>
                    <div class="block__title__controls__prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="block__title__controls__next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="recents__slider">
                @for($i = 0; $i < 15; $i++) 
                    <div class="recents__slider__slides" style="background: url('/images/front/cover.jpg');">

                        <div class="recents__slider__slides__overlay"></div>
                        <div class="recents__slider__slides__text">
                            <div class="recents__slider__slides__text__title">
                                Solo Leveling
                            </div>
                            <div class="recents__slider__slides__text__chapter">
                                Il y a {{ $i }} minutes
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <img src="./images/static/ad.png" style="width: 100%; padding: 40px 0px;">
    </div>



    <!-- start block lecture recente  -->
    
    <!-- end block lecture recente  -->

    <section class="discover">
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
    </section>



    <!-- start block top 4  -->
    <section class="block top-mangas" id="top-mangas">
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
    </section>
    <!-- end block top 4  -->



    <!-- start block sorties recentes  -->
    <section class="block recent" id="new">
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
    </section>
    <!-- end block sorties recentes  -->

    <footer class="footer">
        <img class="footer__logo" src="/images/static/logo.png" alt="Manga Origine">
        <p class="footer__copyright">@2021 Origines Corporation, tous droits réservés.</p>
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
    </script>

    @toastr_js
    @toastr_render

    @stack('scripts')

</body>

</html>