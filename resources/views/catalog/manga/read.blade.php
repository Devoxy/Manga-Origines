@extends('template.front')

@section('title', $chapter->label . ' - ' . $manga->name)

@section('content')

<input name="manga_id" value="{{ $manga->id }}" type="hidden"> 
<input name="chapter_id" value="{{ $chapter->id }}" type="hidden"> 

<div class="manga">
    <div class="manga__banner">
        <div class="manga__banner__overlay"></div>
        <img class="banner" src="{{ Storage::disk('cloud')->url($manga->banner_path) }}" alt="{{ $manga->name }}" loading="lazy">
        <h2 class="manga__banner__title"><a href="{{ route('catalog.manga', ['slug' => $manga->slug]) }}">{{ $manga->name }}</a></h2>
        <h3 class="manga__banner__subtitle">{{ $chapter->label }}</h3>
    </div>

    <div class="container">
        <div class="container-sidebar">
            <div class="container-sidebar__content">
                <div class="manga__read">
                    <div class="manga__read__selection">
                        @if($previous == null)
                            <a href="{{ route('catalog.manga', ['slug' => $manga->slug]) }}" class="btn-selection"><i class="fa fa-book"></i> Retour aux chapitres</a>
                        @else
                            <a href="{{ route('catalog.manga.read', ['slug' => $manga->slug, 'chapter' => $previous]) }}" class="btn-selection"><i class="fa fa-long-arrow-left"></i> Chapitre précédent</a>
                        @endif

                        @if($next == null)
                            <a href="{{ route('catalog.manga', ['slug' => $manga->slug]) }}" class="btn-selection"><i class="fa fa-book"></i> Retour aux chapitres</a>
                        @else
                            <a href="{{ route('catalog.manga.read', ['slug' => $manga->slug, 'chapter' => $next]) }}" class="btn-selection">Chapitre suivant <i class="fa fa-long-arrow-right"></i> </a>
                        @endif
                    </div>

                    @php 
                        $size = count($files);
                        $i = 1;
                    @endphp

                    @foreach($files as $file)
                        <img id="page-{{ $i }}" data-page="{{ $i }}" src="{{ Storage::disk('cloud')->url($file) }}" alt="{{ basename($file) }}" loading="lazy" class="{{ $i >= $size ? 'manga-last-page' : 'manga-page' }}">
                        @php $i++; @endphp
                    @endforeach
                    
                    <div class="manga__read__selection">
                        @if($previous == null)
                            <a href="{{ route('catalog.manga', ['slug' => $manga->slug]) }}" class="btn-selection"><i class="fa fa-book"></i> Retour aux chapitres</a>
                        @else
                            <a href="{{ route('catalog.manga.read', ['slug' => $manga->slug, 'chapter' => $previous]) }}" class="btn-selection"><i class="fa fa-long-arrow-left"></i> Chapitre précédent</a>
                        @endif

                        @if($next == null)
                            <a href="{{ route('catalog.manga', ['slug' => $manga->slug]) }}" class="btn-selection"><i class="fa fa-book"></i> Retour aux chapitres</a>
                        @else
                            <a href="{{ route('catalog.manga.read', ['slug' => $manga->slug, 'chapter' => $next]) }}" class="btn-selection">Chapitre suivant <i class="fa fa-long-arrow-right"></i> </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-sidebar__sidebar">
                @include('template.sidebar')
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>

var 
    lastViewedPage = 1,
    actualPage = 0,
    lastScrollTop = 0;

$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(document).ready(function() {
    $(window).scroll(function () {

        var st = $(this).scrollTop();
        if(st > lastScrollTop) {

            $(".manga-page").each(function() {

                if($(this).isInViewport()) {
            
                    actualPage = $(this).data('page');
                    return false;
                }  
            });
        }
        lastScrollTop = st;
    });
});

@if(!\Auth::guest())

    setInterval(function() {

        if(lastViewedPage != actualPage) {

            lastViewedPage = actualPage;
            $.get("/catalog/history/" + $('input[name=manga_id]').val() + "/" + $('input[name=chapter_id]').val() + "/" + lastViewedPage);
        }

    }, 500);

@endif
</script>
@endpush
@endsection