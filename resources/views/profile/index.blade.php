@extends('layouts.master')

@section('styles')
<style>
	.gravatar {
		position: relative;
		text-align: center;
		padding-left: 25px;
	}
	.img-rounded {
		border-radius: 50%;
		position: relative;
		width: 250px;
		height: 250px;
	}
</style>
@stop

@section('pg-title', 'Profile')
@section('pg-head-left', 'My Profile Details')
@section('pg-head-right')
	<a href="{{ url('profile/edit') }}" class="btn bg-cyan waves-effect">
		<i class="material-icons">mode_edit</i>
		Edit Profile
	</a>
@stop

@section('content')
	<div class="row clearfix">
		<div class="col-md-5">
			<div class="card">
                <div class="body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="gravatar">
                                <img src="{{ asset($profile->avatar_url()) }}" class="img-responsive img-rounded">
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="text-center" style="font-size: 1.3em; color: #555;">
                                {{ '@' . $profile->username }}
                            </div>
                        </li>
                        <li class="list-group-item">
                            <form action="{{ url('profile/avatar') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="row clearfix" style="padding-bottom: 0px;">
                                <legend class="text-center">Upload/Change profile picture</legend>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6" style="margin-bottom: 0px;">
                                    <div class="form-group{{ $errors->first('profile_avatar') ? ' error' : '' }}">
                                        <input type="file" class="form-control" name="profile_avatar">
                                        @include('layouts.partials.formError', ['key' => 'profile_avatar'])
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="margin-bottom: 0px;">
                                    <input type="submit" class="btn btn-primary m-l-10 waves-effect" value="Upload">
                                </div>
                                </div>
                            </form> 
                        </li>
                    </ul>
                </div>
            </div>
		</div>
		<div class="col-md-7">
			<div class="card">
                <div class="body">
                    <div class="list-group">
                        <a href="javascript:void(0);" class="list-group-item">
                            <span class="badge bg-gray">CODE/ID</span> 
                            <strong>{{ $profile->code ? : 'XXXXX' }}</strong>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <span class="badge bg-gray">Full Name</span> <strong>{{ $profile->name }}</strong>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <span class="badge bg-gray">Mobile No.</span> <strong>+88{{ $profile->phone }}</strong>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <span class="badge bg-gray">Gender/Sex</span> <strong>{{ ucfirst($profile->gender) }} User</strong>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <span class="badge bg-gray">Date of Birth</span> 
                            <strong>{{ $profile->dob ? $profile->dob->format('M d, Y') : 'Not Provided'}}</strong>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <span class="badge bg-gray">Residential Address</span> 
                            <strong>{{ $profile->address }}</strong>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <span class="badge bg-gray">Member Since</span> 
                            <strong>{{ $profile->created_at->diffForHumans() }}</strong>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <span class="badge bg-gray">Access Type</span> 
                            <strong>{{ ucfirst($profile->type) }}</strong>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <span class="badge bg-gray">Login Status</span> 
                            <strong>{{ $profile->status ? 'Active' : 'Suspended' }}</strong>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item">
                            <span class="badge bg-gray">Last Login</span> <strong>2 days ago</strong>
                        </a>
                    </div>
                </div>
            </div>
		</div>
	</div>
@stop

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
	$('input:submit').attr('disabled',true);
	$('input:file').on('change', function(){	
		if ($(this).val()) {
			var fileExtension = ['jpeg', 'jpg', 'png'];
	        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
	        	swal(
				  'invalid image format',
				  "Only formats are allowed : " + fileExtension.join(', '),
				  'error'
				)
	        }else{
	        	$('input:submit').attr('disabled',false);
	        }
	    }else{
	        $('input:submit').attr('disabled',true);
	    }
	});
});	
</script>
@stop