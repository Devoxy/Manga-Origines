@extends('template.app')

@section('title', 'Gestion du catalogue')

@section('content')
<div class="page-header">
    <h1>
        Gestion du catalogue
        <small><i class="ace-icon fa fa-angle-double-right"></i> Liste des oeuvres</small>
    </h1>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="widget-box">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title">Informations</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
                    <a href="{{ route('admin.catalog.mangas.create') }}" class="btn btn-success btn-block">
                        <i class="ace-icon fa fa-wrench"></i>
                        Créer une oeuvre
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-9">
        <div class="widget-box">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title">Données</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <table id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th class="detail-col">Détails</th>
                                <th>Type</th>
                                <th>Visibilitée</th>
                                <th>
                                    <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                    Dernière modification
                                </th>
                                <th class="hidden-480">Status</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($mangas as $manga)
                            <tr>
                                <td>{{ $manga->name }}</td>

                                <td class="center">
                                    <div class="action-buttons">
                                        <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                                            <i class="ace-icon fa fa-angle-double-down"></i>
                                            <span class="sr-only">Details</span>
                                        </a>
                                    </div>
                                </td>

                                <td><a href="{{ route('admin.catalog.types.edit', ['id' => $manga->type]) }}">{{ $manga->getTypeName() }}</a></td>
                                <td>{!! $manga->getAccessHtml() !!}</td>
                                <td>{{ $manga->updated_at->diffForHumans() }}</td>

                                <td class="hidden-480">
                                    <span class="label label-sm label-primary">{{ $manga->getStatusName() }}</span>
                                </td>

                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="{{ route('admin.catalog.mangas.edit', ['id' => $manga->id]) }}" class="btn btn-xs btn-info">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </a>

                                        <a href="{{ route('admin.catalog.mangas.delete', ['id' => $manga->id]) }}" class="btn btn-xs btn-danger delete-confirm">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="detail-row">
                                <td colspan="8">
                                    <div class="table-detail">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-2">
                                                <div class="text-center">
                                                    <img height="150" class="thumbnail img-responsive no-margin-bottom" alt="{{ $manga->name }}" src="{{ \Storage::disk('cloud')->url($manga->cover_path) }}" />
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-5">
                                                <div class="space visible-xs"></div>

                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Nom </div>

                                                        <div class="profile-info-value">
                                                            <span>{{ $manga->name }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Nom alternatif </div>

                                                        <div class="profile-info-value">
                                                            <span>{{ $manga->original_name }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Type </div>

                                                        <div class="profile-info-value">
                                                            <span>{{ $manga->getTypeName() }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Status </div>

                                                        <div class="profile-info-value">
                                                            <span>{{ $manga->getStatusName() }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Date de création </div>

                                                        <div class="profile-info-value">
                                                            <span>{{ $manga->created_at->format('d/m/Y H:i') }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Dernière modification </div>

                                                        <div class="profile-info-value">
                                                            <span>{{ $manga->updated_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-5">
                                                <div class="space visible-xs"></div>

                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Tags </div>

                                                        <div class="profile-info-value">
                                                            <span>
                                                                @foreach($manga->getTags() as $tag)
                                                                    <span class="badge badge-primary">{{ $tag->label }}</span>
                                                                @endforeach
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Accessibilitée </div>

                                                        <div class="profile-info-value">
                                                            <span>{!! $manga->getAccessHtml() !!}</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Contenu adulte </div>

                                                        <div class="profile-info-value">
                                                            <span>
                                                                @if($manga->adult)
                                                                    Oui
                                                                @else
                                                                    Non
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Exclusive </div>

                                                        <div class="profile-info-value">
                                                            <span>
                                                                @if($manga->exclusive)
                                                                    Oui
                                                                @else
                                                                    Non
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Team </div>

                                                        <div class="profile-info-value">
                                                            <span>{{ $manga->getTeamName() }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Auteur(s) </div>

                                                        <div class="profile-info-value">
                                                            <span>{!! $manga->getAuthorsHtml() !!}</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Artiste(s) </div>

                                                        <div class="profile-info-value">
                                                            <span>{!! $manga->getArtistsHtml() !!}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(".delete-confirm").on(ace.click_event, function() {

        event.preventDefault();
        $href = $(this).attr('href');

        bootbox.dialog({
            message: "<span class='bigger-110'>Voulez-vous vraiment supprimer cette oeuvre ?</span>",
            buttons:
            {
                "danger" :
                {
                    "label" : "Annuler",
                    "className" : "btn-sm btn-danger",
                },
                "success" :
                    {
                    "label" : "<i class='ace-icon fa fa-check'></i> Confirmer",
                    "className" : "btn-sm btn-success",
                    "callback": function() {
                        window.location = $href;
                    }
                }
            }
        });
    });

    var active_class = 'active';
    $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
        var th_checked = this.checked;//checkbox inside "TH" table header
        
        $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
            else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
        });
    });
    
    //select/deselect a row when the checkbox is checked/unchecked
    $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
        var $row = $(this).closest('tr');
        if($row.is('.detail-row ')) return;
        if(this.checked) $row.addClass(active_class);
        else $row.removeClass(active_class);
    });

    $('.show-details-btn').on('click', function(e) {
        e.preventDefault();
        $(this).closest('tr').next().toggleClass('open');
        $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
    });
</script>
@endpush
@endsection