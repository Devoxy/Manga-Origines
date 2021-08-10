@extends('template.app')

@section('title', 'Gestion des tags')

@section('content')
<div class="page-header">
    <h1>
        Gestion des tags
        <small><i class="ace-icon fa fa-angle-double-right"></i> Liste des tags</small>
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
                    <a href="{{ route('admin.catalog.tags.create') }}" class="btn btn-success btn-block">
                        <i class="ace-icon fa fa-wrench"></i>
                        Créer un tag
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
                    <th>#</th>
                    <th>Label</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($tags as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td><span class="badge" style="background: {{ $data->color }};">{{ $data->label }}</span></td>
                        <td>{{ $data->description }}</td>
                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                                {{-- <a class="btn btn-xs btn-success">
                                    <i class="ace-icon fa fa-check bigger-120"></i>
                                </a> --}}

                                <a href="{{ route('admin.catalog.tags.edit', ['id' => $data->id]) }}" class="btn btn-xs btn-info">
                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                </a>

                                <a href="{{ route('admin.catalog.tags.delete', ['id' => $data->id]) }}" class="btn btn-xs btn-danger delete-confirm">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </a>

                                {{-- <a class="btn btn-xs btn-warning">
                                    <i class="ace-icon fa fa-flag bigger-120"></i>
                                </a> --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
    $(".delete-confirm").on(ace.click_event, function() {

        event.preventDefault();
        $href = $(this).attr('href');

        bootbox.dialog({
            message: "<span class='bigger-110'>Voulez-vous vraiment supprimer ce status de manga ?</span>",
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
</script>
@endpush
@endsection