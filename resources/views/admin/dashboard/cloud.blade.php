@extends('template.app')

@section('title', 'Cloud')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
@endpush
<div class="page-header">
    <h1>
        Cloud
    </h1>
</div>

<div class="row">
    <div class="col-sm-12">
        <div style="height: 500px;">
            <div id="fm"></div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endpush
@endsection