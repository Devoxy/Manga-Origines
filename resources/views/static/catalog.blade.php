@extends('template.front')

@section('title', 'Catalogue')

@section('content')
<div class="container">
    <div class="catalog">
        <div class="catalog__bigtitle">
            <h1>Catalogue</h1>
        </div>
        <div class="catalog__search">
            <div class="catalog__search__input">
                <span class="search-icon"></span>
                <input type="text" placeholder="Tapez votre recherche...">
                <button type="submit" class="search-submit">Go</button>
            </div>
        </div>
    </div>
</div>
@endsection