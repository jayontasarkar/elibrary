@extends('layouts.master')

@section('pg-title', 'Author Management | Create Author')
@section('pg-head-left', 'Author Management | Create New Author')
@section('pg-head-right')
<a href="{{ url('authors') }}" class="btn btn-default">
    <i class="material-icons">subdirectory_arrow_left</i>&nbsp;Back
</a>
@stop

@section('content')

<form action="{{ url('authors') }}" method="POST">
    {{ csrf_field() }}
    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('name') ? ' error' : '' }}">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="false">
                    <label class="form-label">Author Name</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'name'])
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <select class="form-control show-tick{{ $errors->first('nationality') ? ' error' : '' }}" name="nationality">
                    <option value="">-- Select author naitonality --</option>
                    <option value="1" {{ old('nationality') == '1' ? 'selected' : '' }}>BANGLADESHI WRITER</option>
                    <option value="2" {{ old('nationality') == '2' ? 'selected' : '' }}>FOREIGN WRITER</option>
                </select>
                @include('layouts.partials.formError', ['key' => 'nationality'])
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('biography') ? ' error' : '' }}">
                    <textarea name="biography" class="form-control" cols="30" rows="4">{{ old('biography') }}</textarea>
                    <label class="form-label" id="phone">Author Biography</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'biography'])
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary btn-lg" value="Save Changes" style="margin-right: 30px;">
                <input type="reset" class="btn btn-warning btn-lg" value="Reset Author">
            </div>
        </div>
    </div>
</form>

@stop
