@extends('template.app')

@section('title', 'Gestion du catalogue')

@section('content')
<div class="page-header">
    <h1>
        Gestion du catalogue
        <small><i class="ace-icon fa fa-angle-double-right"></i> Créer une oeuvre</small>
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
                <label class="col-sm-3 control-label no-padding-right" for="name">Nom</label>

                <div class="col-sm-4">
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="original_name">Nom original</label>

                <div class="col-sm-4">
                    <input type="text" name="original_name" id="original_name" class="form-control @error('original_name') is-invalid @enderror" value="{{ old('original_name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="type">Type</label>

                <div class="col-sm-4">
                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="status">Status</label>

                <div class="col-sm-4">
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        @foreach($status as $data)
                            <option value="{{ $data->id }}">{{ $data->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="tags">Tags</label>

                <div class="col-sm-4">
                    <select name="tags[]" id="tags" class="form-control @error('tags') is-invalid @enderror" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="adult">Contenu pour adulte ?</label>

                <div class="col-sm-4">
                    <select name="adult" id="adult" class="form-control @error('adult') is-invalid @enderror">
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="access">Accessibilitée ?</label>

                <div class="col-sm-4">
                    <select name="access" id="access" class="form-control @error('access') is-invalid @enderror">
                        <option value="0">Tous</option>
                        <option value="1">VIP</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="exclusive">Oeuvre exclusive ?</label>

                <div class="col-sm-4">
                    <select name="exclusive" id="exclusive" class="form-control @error('exclusive') is-invalid @enderror">
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="synopsis">Synopsis</label>

                <div class="col-sm-4">
                    <textarea name="synopsis" id="synopsis" class="form-control @error('synopsis') is-invalid @enderror">{{ old('synopsis') }}</textarea>
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
@endsection