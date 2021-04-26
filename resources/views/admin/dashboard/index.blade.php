@extends('template.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1>
        Dashboard
    </h1>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="widget-box">
            <div class="widget-header widget-header-flat widget-header-small">
                <h5 class="widget-title">
                    <i class="ace-icon fa fa-download"></i>
                    Statistiques globales
                </h5>
            </div>
            <div class="widget-body">
				<div class="widget-main infobox-container">
                    <div class="infobox infobox-blue">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-users"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number">{{ $stats->users }}</span>
                            <div class="infobox-content">Utilisateurs inscrits</div>
                        </div>
                    </div>
                    <div class="infobox infobox-green">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-book"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number">{{ $stats->mangas }}</span>
                            <div class="infobox-content">Mangas publiés</div>
                        </div>
                    </div>
                    <div class="infobox infobox-orange">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-bullhorn"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-text">{{ $stats->last_manga }}</span>
                            <div class="infobox-content">Dernier manga</div>
                        </div>
                    </div>
                    <div class="infobox infobox-red">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-fire"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number">{{ $stats->views }}</span>
                            <div class="infobox-content">Nombre de vues</div>
                        </div>
                    </div>
                    <div class="infobox infobox-purple">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-bookmark"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-text">{{ $stats->manga_most_view }}</span>
                            <div class="infobox-content">Manga le plus vue</div>
                        </div>
                    </div>
                    <div class="infobox infobox-pink">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-folder"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-text">{{ $stats->category_most_view }}</span>
                            <div class="infobox-content">Catégorie la plus vue</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection