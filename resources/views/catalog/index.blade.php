@extends('template.front')

@section('title', 'Catalogue')

@section('content')
<div class="container">
    <div class="catalog">
        <div class="catalog__bigtitle">
            <h1>Catalogue</h1>
            <div class="catalog__search">
                <div class="catalog__search__input">
                    <span class="search-icon"></span>
                    <input type="text" placeholder="Tapez votre recherche...">
                    <button type="submit" class="search-submit">Chercher</button>
                </div>
            </div>
        </div>

        <img src="./images/static/ad.png" style="width: 100%; padding: 40px 0px;">

        <div class="container-sidebar">
             <div class="container-sidebar__sidebar">
                @include('catalog.sidebar')
            </div>
            <div class="container-sidebar__content catalog">
                sddfsdfd
            </div>
        </div>
    </div>
</div>
@endsection