@extends('template.app')

@section('title', 'Gestion du catalogue')

@section('content')

@push('styles')
<link href="https://releases.transloadit.com/uppy/v1.31.0/uppy.min.css" rel="stylesheet">
@endpush

<div class="page-header">
    <h1>
        Gestion du catalogue
        <small><i class="ace-icon fa fa-angle-double-right"></i> Éditer une oeuvre</small>
    </h1>
</div>

<div class="row">
    <div class="col-md-12">
        <hr>
        <div class="widget-box">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title">Chapitre {{ $chapter->number }}</small></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="simple-table" class="table  table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Nom</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($files as $file)
                                        <tr>
                                            <td><img style="width: 300px; display: block; margin-left: auto; margin-right: auto;" src="{{ Storage::disk('cloud')->url($file) }}" class="img-responsive"></td>
                                            <td>{{ basename($file) }}</td>
                                            <td>
                                                <div class="hidden-sm hidden-xs btn-group">
                                                    <a href="{{ route('admin.catalog.mangas.chapter.image.delete', ['id' => $chapter->id, 'path' => urlencode($file)]) }}" class="btn btn-xs btn-danger delete-confirm">
                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                    </a>
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
    </div>
</div>

@push('scripts')
@endpush
@endsection