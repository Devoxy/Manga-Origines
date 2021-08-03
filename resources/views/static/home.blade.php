@extends('template.front')

@section('title', 'Accueil')

@section('content')
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

    <div class="container-sidebar">
        <div class="home-content">
            <div class="block news" id="news">
                <div class="block__title news">
                    <h3>Mis à jour récemment</h3>
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
                <div class="news__slider">
                    @for($i = 0; $i < 15; $i++) 
                        <div class="news__slider__slides" style="background: url('/images/front/cover.jpg');">

                            <div class="news__slider__slides__overlay"></div>
                            <div class="news__slider__slides__text">
                                <div class="news__slider__slides__text__title">
                                    Solo Leveling
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="block exclusives" id="exclusives" style="margin-top: 20px">
                <div class="block__title exclusives">
                    <h3>Oeuvres exclusives</h3>
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
                <div class="exclusives__slider">
                    @for($i = 0; $i < 15; $i++) 
                        <div class="exclusives__slider__slides" style="background: url('/images/front/cover.jpg');">

                            <div class="exclusives__slider__slides__overlay"></div>
                            <div class="exclusives__slider__slides__text">
                                <div class="exclusives__slider__slides__text__title">
                                    Solo Leveling
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <aside class="home-sidebar">
            @include('template.sidebar')
        </aside>
    </div>

    <img src="./images/static/ad.png" style="width: 100%; padding: 40px 0px;">
</div>
@endsection