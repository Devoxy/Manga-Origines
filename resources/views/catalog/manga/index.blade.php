@extends('template.front')

@section('title', $manga->name)

@section('content')
<div class="manga">
    
    <div class="manga__banner">
        <div class="manga__banner__overlay"></div>
        <img class="banner" src="{{ Storage::disk('cloud')->url($manga->banner_path) }}" alt="{{ $manga->name }}">
        <div class="manga__banner__infos">
            <div class="manga__banner__infos__cover">
                <img src="{{ Storage::disk('cloud')->url($manga->cover_path) }}" alt="{{ $manga->name }}">
            </div>
            <div class="manga__banner__infos__details">
                <div class="manga__banner__infos__details__title">
                    <span class="manga-type">{{ $type->label }}</span>
                    @if($manga->original_name != '') 
                        <h2 class="manga-alternatif">{{ $manga->original_name }}</h2>
                    @endif
                    <h2>{{ $manga->name }}</h2>
                </div>
                <div class="manga__banner__infos__details__posts">
                    <div class="manga__banner__infos__details__posts__item">
                        <div class="manga__banner__infos__details__posts__item__title">Auteur(s) : </div>
                        <div class="manga__banner__infos__details__posts__item__content">
                            @foreach(json_decode($manga->authors, true) as $author)
                                <span class="tag">{{ $author }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="manga__banner__infos__details__posts__item">
                        <div class="manga__banner__infos__details__posts__item__title">Artiste(s) : </div>
                        <div class="manga__banner__infos__details__posts__item__content">
                            @foreach(json_decode($manga->artists, true) as $artist)
                                <span class="tag">{{ $artist }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="manga__banner__infos__details__posts__item">
                        <div class="manga__banner__infos__details__posts__item__title">Team : </div>
                        <div class="manga__banner__infos__details__posts__item__content">
                            TODO
                        </div>
                    </div>
                    <div class="manga__banner__infos__details__posts__item">
                        <div class="manga__banner__infos__details__posts__item__title">Tags : </div>
                        <div class="manga__banner__infos__details__posts__item__content">
                            @foreach($tags as $tag)
                                <span class="tag">{{ $tag->label }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="manga__banner__infos__details__posts__item">
                        <div class="manga__banner__infos__details__posts__item__title">Synopsis : </div>
                        <div class="manga__banner__infos__details__posts__item__content">
                            {!! nl2br($manga->synopsis) !!}
                        </div>
                    </div>
                </div>
                <div class="manga__banner__infos__details__buttons">
                    <a href="#" class="btn btn-warning">Commencer la lecture</a>
                    <a href="#" class="primary-button">Lire le dernier chapitre</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-sidebar">
            <div class="container-sidebar__content">
                <div class="block chapters" id="chapters" style="margin-top: 20px">
                    <div class="block__title chapters">
                        <h3>Chapitres</h3>
                    </div>
                    
                    <div class="manga">
                        <div class="manga__chapters">
                            @foreach($chapters as $chapter)
                                <a href="">#{{ $chapter->number }} {{ $chapter->label }}</a>
                            @endforeach
                            {{ $chapters->links('vendor.pagination.default') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-sidebar__sidebar">
                @include('template.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection