@extends('layouts.master')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.2/css/lightgallery.css" />
<style>
    .delete-btn {
        position: absolute;
        overflow: hidden;
        cursor: pointer;
        top: 6px;
        right: 20px;
        height: 27px;
        width: 27px;
        color: #fff;
        padding: 2px;
        padding-top: 0px;
        text-align: center;
        background-color: rgba(128, 0, 0, .2);
        color: darkred;
        font-size: 20px;
        overflow: hidden;
        font-weight: bold;
        transition: .9s all;
    }
    .delete-btn:hover {
        background-color: rgba(128, 0, 0, .7);
        color: #fff;
        text-decoration: none;
    }
</style>
@stop

@section('pg-title', 'Photo Gallery')
@section('pg-head-left', 'Upload images for Image Gallery')

@section('content')
<div id="aniimated-thumbnials" class="list-unstyled row clearfix">
@foreach($galleries as $key => $gallery)
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 hover-me">
        <div data-href="{{ url('/gallery/delete/' . $gallery->id) }}" class="delete-btn">
            <i class="material-icons">delete</i>
        </div>
    	<a href="{{ asset('images/gallery/' . $gallery->path) }}" data-sub-html="Gallery Image {{ $key + 1 }}">
            <img class="img-responsive thumbnail" src="{{ asset('images/gallery/' . $gallery->path) }}">
        </a>
    </div>
@endforeach    
</div>
<hr>
@if(count($galleries) <= 12)
<form action="{{ url('gallery') }}" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
    <div class="dz-message">
        <div class="drag-icon-cph">
            <i class="material-icons">touch_app</i>
        </div>
        <h3>Drop gallery images here or click to upload.</h3>
        <em>(you are allowed to upload maximum 4 images at a time.this is restricted for security reason)</em>
    </div>
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
</form> 
@else
<h4 class="text-center">maximum limit exceeded. To add more images first remove older images.</h4>
@endif
@stop

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.2/js/lightgallery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        @if(count($galleries) <= 12)
		Dropzone.options.frmFileUpload = {
	        paramName: "file",
	        maxFilesize: 1,
	        maxFiles: 4,
       		acceptedFiles: ".jpeg,.jpg,.png"
	    };
        @endif
		$('#aniimated-thumbnials').lightGallery({
        	thumbnail: true,
        	selector: 'a'
    	});
        $(".delete-btn").on('click', function(event){
            event.preventDefault();
            var $this = $(this);
            swal({
              title: 'Are you sure?',
              text: "this will delete the image permanently",
              type: 'warning',
              showCancelButton: true
            }).then(function () {
              $.get($this.attr('data-href'), function(response){
                  location.reload();
              });   
            });  
        })
	});
</script>
@stop