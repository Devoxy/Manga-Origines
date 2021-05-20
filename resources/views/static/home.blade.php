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
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                Test
            </div>
            <div class="col-md-2">Test</div>
            <div class="col-md-4">test</div>
        </div>
    </div>

    <div class="recent">
        <div class="recent__top">
            <div class="recent__top__title">
                Lecture récente
            </div>
            <div class="recent__top__controls">
                <div class="recent__top__controls__prev"><i class="fa fa-4x fa-angle-left"></i></div>
                <div class="recent__top__controls__next"><i class="fa fa-4x fa-angle-right"></i></div>

            </div>
        </div>
        <div class="recent__slider">
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
            <div class="recent__slider__slides">
                <div class="recent__slider__slides__text">
                    <div class="recent__slider__slides__text__title">
                        Solo Leveling
                    </div>
                    <div class="recent__slider__slides__text__chapter">
                        Chapitre 2
                    </div>
                </div>
                <img src="/images/front/cover.jpg">
            </div>
        </div>
    </div>


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
            prevArrow: $('.recent__top__controls__prev'),
            nextArrow: $('.recent__top__controls__next'),
            dots: false,
        });
    </script>

    @toastr_js
    @toastr_render

    @stack('scripts')

</body>

</html>