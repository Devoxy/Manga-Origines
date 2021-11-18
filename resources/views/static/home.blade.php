@extends('template.front')

@section('title', 'Accueil')

@section('content')
    <div class="container">
        <div class="home-slider">
            <div id="home-slider">
                @for ($i = 0; $i < 5; $i++)
                    <div class="home-slider__slide">
                        {{ $i }}
                    </div>
                @endfor
            </div>
        </div>

        <div class="home-categories">
            <a href="#" class="btn-secondary webcomic">Webcomic</a>
            <a href="#" class="btn-secondary manhua">Manhua</a>
            <a href="#" class="btn-secondary manhwa">Manhwa</a>
            <a href="#" class="btn-secondary romance">Romance</a>
            <a href="#" class="btn-secondary shonen">Shonen</a>
            <a href="#" class="btn-secondary novel">Novel</a>
            <a href="#" class="btn-secondary adult">Adult</a>
            <a href="#" class="btn-secondary shojo">Shojo</a>
            <a href="#" class="btn-secondary shonen-ai">Shonen-AI</a>
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
                @foreach ($tendances as $tendance)
                    <div class="tendances__slider__slides"
                        style="background: url('{{ Storage::disk('cloud')->url($tendance->cover_path) }}');"></div>
                @endforeach
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
                @foreach ($lasts as $last)
                    <a href="{{ route('catalog.manga', ['slug' => $last->slug]) }}" class="recents__slider__slides"
                        style="background: url('{{ Storage::disk('cloud')->url($last->cover_path) }}');">

                        <div class="recents__slider__slides__overlay"></div>
                        <div class="recents__slider__slides__text">
                            <div class="recents__slider__slides__text__title">
                                {{ $last->name }}
                            </div>
                            <div class="recents__slider__slides__text__chapter">
                                {{ $last->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </a>
                @endforeach
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
                        @foreach ($updateds as $updated)
                            <a href="#" class="news__slider__slides"
                                style="background: url('{{ Storage::disk('cloud')->url($updated->cover_path) }}');">

                                <div class="news__slider__slides__overlay"></div>
                                <div class="news__slider__slides__text">
                                    <div class="news__slider__slides__text__title">
                                        {{ $updated->name }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
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
                        @foreach ($exclusives as $exclusive)
                            <a href="#" class="exclusives__slider__slides"
                                style="background: url('{{ Storage::disk('cloud')->url($exclusive->cover_path) }}');">

                                <div class="exclusives__slider__slides__overlay"></div>
                                <div class="exclusives__slider__slides__text">
                                    <div class="exclusives__slider__slides__text__title">
                                        {{ $exclusive->name }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
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
