@extends('template.app')

@section('title', 'Gestion des tags')

@section('content')
<div class="page-header">
    <h1>
        Gestion des tags
        <small><i class="ace-icon fa fa-angle-double-right"></i> Créer un tag</small>
    </h1>
</div>

<div class="row">
    <div class="col-md-12">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal" method="post">

            @csrf

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="label">Label</label>

                <div class="col-sm-9">
                    <input type="text" name="label" id="label" class="col-xs-10 col-sm-5 @error('label') is-invalid @enderror" value="{{ old('label') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="description">Description</label>

                <div class="col-sm-9">
                    <input type="text" name="description" id="description" class="col-xs-10 col-sm-5 @error('description') is-invalid @enderror" value="{{ old('description') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="color">Couleur</label>

                <div class="col-sm-9">
                    <div class="bootstrap-colorpicker">
                        <input id="color" name="color" type="text" class="col-xs-10 col-sm-5 @error('color') is-invalid @enderror"  value="{{ old('color') }}">
                    </div>
                </div>
            </div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Valider
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    $('#color').colorpicker();
</script>
@endpush
@endsection