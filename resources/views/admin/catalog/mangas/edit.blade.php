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

        <div class="row">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                @csrf

                <div class="col-md-6">
                
                    <div class="widget-box">
                        <div class="widget-header widget-header-flat">
                            <h4 class="widget-title">{{ $manga->name }}</h4>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
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
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $manga->name }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="original_name">Nom alternatif</label>

                                    <div class="col-sm-9">
                                        <input type="text" name="original_name" id="original_name" class="form-control @error('original_name') is-invalid @enderror" value="{{ $manga->original_name }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="type">Type <sup class="text-danger">*</sup></label>

                                    <div class="col-sm-9">
                                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}" {{ $manga->type == $type->id ? 'selected' : '' }}>{{ $type->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="status">Status <sup class="text-danger">*</sup></label>

                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                            @foreach($status as $data)
                                                <option value="{{ $data->id }}" {{ $manga->status == $data->id ? 'selected' : '' }}>{{ $data->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="authors">Auteur(s) <sup class="text-danger">*</sup></label>

                                    <div class="col-sm-9">
                                        <input type="text" name="authors" class="form-control @error('authors') is-invalid @enderror" id="authors" value="{{ str_replace(['[', ']', '"'], "", $manga->authors) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="artists">Artiste(s) <sup class="text-danger">*</sup></label>

                                    <div class="col-sm-9">
                                        <input type="text" name="artists" class="form-control @error('artists') is-invalid @enderror" id="artists" value="{{ str_replace(['[', ']', '"'], "", $manga->artists) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="tags">Tags <sup class="text-danger">*</sup></label>

                                    <div class="col-sm-9">
                                        <select name="tags[]" id="tags" class="form-control @error('tags') is-invalid @enderror" multiple="multiple">
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}" {{ $manga->hasTag($tag->id) ? 'selected' : '' }}>{{ $tag->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="adult">Contenu pour adulte ? <sup class="text-danger">*</sup></label>

                                    <div class="col-sm-9">
                                        <select name="adult" id="adult" class="form-control @error('adult') is-invalid @enderror">
                                            <option value="0" {{ $manga->adult == 0 ? 'selected' : '' }}>Non</option>
                                            <option value="1" {{ $manga->adult == 1 ? 'selected' : '' }}>Oui</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="access">Accessibilitée ? <sup class="text-danger">*</sup></label>

                                    <div class="col-sm-9">
                                        <select name="access" id="access" class="form-control @error('access') is-invalid @enderror">
                                            <option value="0" {{ $manga->access == 0 ? 'selected' : '' }}>Tous</option>
                                            <option value="1" {{ $manga->access == 1 ? 'selected' : '' }}>VIP</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="exclusive">Oeuvre exclusive ? <sup class="text-danger">*</sup></label>

                                    <div class="col-sm-9">
                                        <select name="exclusive" id="exclusive" class="form-control @error('exclusive') is-invalid @enderror">
                                            <option value="0" {{ $manga->exclusive == 0 ? 'selected' : '' }}>Non</option>
                                            <option value="1" {{ $manga->exclusive == 1 ? 'selected' : '' }}>Oui</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="synopsis">Synopsis <sup class="text-danger">*</sup></label>

                                    <div class="col-sm-9">
                                        <textarea name="synopsis" id="synopsis" class="form-control @error('synopsis') is-invalid @enderror">{!! $manga->synopsis !!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="cover">Couverture <sup class="text-danger">*</sup></label>

                                    <div class="col-sm-9">
                                        <input type="file" id="cover" name="cover">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="banner">Bannière</label>

                                    <div class="col-sm-9">
                                        <input type="file" id="banner" name="banner">
                                    </div>
                                </div>
                            </div>
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
                                        @if($manga->cover_path == null)
                                            <p id="coverr-preview-text" class="text-warning">Sélectionnez une image pour avoir la prévualisation</p>
                                            <img id="cover-preview" class="img-responsive">
                                        @else
                                            <img id="cover-preview" class="img-responsive" src="{{ \Storage::disk('cloud')->url($manga->cover_path) }}">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Bannière : </h4>
                                        @if($manga->banner_path == null)
                                            <p id="banner-preview-text" class="text-warning">Sélectionnez une image pour avoir la prévualisation</p>
                                            <img id="banner-preview" class="img-responsive">
                                        @else
                                            <img id="banner-preview" class="img-responsive" src="{{ \Storage::disk('cloud')->url($manga->banner_path) }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="widget-box">
                        <div class="widget-header widget-header-flat">
                            <h4 class="widget-title">Zone de téléchargement</h4>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>dfsd</p>
                                        <div id="drag-drop-area"></div>
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

<style>
.dropzone {
  text-align: center;
  font-size: 18px;
}

.glyphicon-download {
  font-size: 1.5em;
}

#DropZoneFiddle {
  cursor: pointer;
  border: 1px solid #000;
  padding: 30px 0;
}

</style>

@push('scripts')
<script src="/js/bootstrap-tag.min.js"></script>
<script src="https://releases.transloadit.com/uppy/v1.31.0/uppy.min.js"></script>
<script src="/js/uppy/fr_FR.js"></script>
<script>

var uppy = Uppy.Core({
  debug: true,
  autoProceed: true,
  locale: Uppy.locales.fr_FR,
  restrictions: {
    maxNumberOfFiles: 3,
    allowedFileTypes: ['image/*', 'video/*'],
  }
});
uppy.use(Uppy.Dashboard, {
  inline: true,
  target: '#drag-drop-area',
  showProgressDetails: true,
  note: 'Téléchargement de fichiers zip uniquement',
  height: 250,
  browserBackButtonClose: false
})
uppy.use(Uppy.Tus, { 
    endpoint: '{{ route('admin.catalog.mangas.upload', ['id' => $manga->id]) }}',
    formData: true,
    fieldName: 'file',
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    } 
});


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