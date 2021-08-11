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

        <div class="row">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                @csrf

                <div class="col-md-6">
                
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="name">Nom <sup class="text-danger">*</sup></label>

                        <div class="col-sm-9">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="original_name">Nom alternatif</label>

                        <div class="col-sm-9">
                            <input type="text" name="original_name" id="original_name" class="form-control @error('original_name') is-invalid @enderror" value="{{ old('original_name') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="type">Type <sup class="text-danger">*</sup></label>

                        <div class="col-sm-9">
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="status">Status <sup class="text-danger">*</sup></label>

                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                @foreach($status as $data)
                                    <option value="{{ $data->id }}">{{ $data->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                    	<label class="col-sm-3 control-label no-padding-right" for="authors">Auteur(s) <sup class="text-danger">*</sup></label>

                        <div class="col-sm-9">
                            <input type="text" name="authors" class="form-control @error('authors') is-invalid @enderror" id="authors" value="{{ old('authors') }}">
                        </div>
                    </div>

                     <div class="form-group">
                    	<label class="col-sm-3 control-label no-padding-right" for="artists">Artiste(s) <sup class="text-danger">*</sup></label>

                        <div class="col-sm-9">
                            <input type="text" name="artists" class="form-control @error('artists') is-invalid @enderror" id="artists" value="{{ old('artists') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="tags">Tags <sup class="text-danger">*</sup></label>

                        <div class="col-sm-9">
                            <select name="tags[]" id="tags" class="form-control @error('tags') is-invalid @enderror" multiple="multiple">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="adult">Contenu pour adulte ? <sup class="text-danger">*</sup></label>

                        <div class="col-sm-9">
                            <select name="adult" id="adult" class="form-control @error('adult') is-invalid @enderror">
                                <option value="0">Non</option>
                                <option value="1">Oui</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="access">Accessibilitée ? <sup class="text-danger">*</sup></label>

                        <div class="col-sm-9">
                            <select name="access" id="access" class="form-control @error('access') is-invalid @enderror">
                                <option value="0">Tous</option>
                                <option value="1">VIP</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="exclusive">Oeuvre exclusive ? <sup class="text-danger">*</sup></label>

                        <div class="col-sm-9">
                            <select name="exclusive" id="exclusive" class="form-control @error('exclusive') is-invalid @enderror">
                                <option value="0">Non</option>
                                <option value="1">Oui</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="synopsis">Synopsis <sup class="text-danger">*</sup></label>

                        <div class="col-sm-9">
                            <textarea name="synopsis" id="synopsis" class="form-control @error('synopsis') is-invalid @enderror">{{ old('synopsis') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="cover">Couverture <sup class="text-danger">*</sup></label>

                        <div class="col-sm-9">
                            <input type="file" id="cover" name="cover" value="{{ old('cover') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="banner">Bannière</label>

                        <div class="col-sm-9">
                            <input type="file" id="banner" name="banner" value="{{ old('banner') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget-box">
                        <div class="widget-header widget-header-flat">
                            <h4 class="widget-title">Prévisualisations</h4>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Couverture :</h4>
                                        <p id="cover-preview-text" class="text-warning">Sélectionnez une image pour avoir la prévualisation</p>
                                        <img id="cover-preview" class="img-responsive">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Bannière : </h4>
                                        <p id="banner-preview-text" class="text-warning">Sélectionnez une image pour avoir la prévualisation</p>
                                        <img id="banner-preview" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
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
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="/js/bootstrap-tag.min.js"></script>
<script>
$("#cover").ace_file_input({
    no_file:'Aucun fichier sélectionné',
    btn_choose:'Choisir',
    btn_change:'Changer',
    droppable:true,
    onchange:null,
    thumbnail: 'small',
    before_change:function(files, dropped) {

        $("#cover-preview-text").hide();
        $("#cover-preview").attr('src', URL.createObjectURL(files[0]));
        return true;
    }
});

$("#banner").ace_file_input({
    no_file:'Aucun fichier sélectionné',
    btn_choose:'Choisir',
    btn_change:'Changer',
    droppable:true,
    onchange:null,
    thumbnail: 'small',
    before_change:function(files, dropped) {

        $("#banner-preview-text").hide();
        $("#banner-preview").attr('src', URL.createObjectURL(files[0]));
        return true;
    }
});

var tag_input = $('#authors, #artists');
try{
    tag_input.tag(
    )

    /*programmatically add/remove a tag
    var $tag_obj = $('#authors').data('tag');
    $tag_obj.add('Programmatically Added');
    
    var index = $tag_obj.inValues('some tag');
    $tag_obj.remove(index);*/
}
catch(e) {
    //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
    tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
    //autosize($('#form-field-tags'));
}
</script>
@endpush
@endsection