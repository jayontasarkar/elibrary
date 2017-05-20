<form action="{{ url('categories') }}" method="POST">
	{{ csrf_field() }}
	<div class="form-group form-float">
        <div class="form-line{{ $errors->first('title') ? ' error' : '' }}">
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            <label class="form-label">Category Title</label>
        </div>
        @include('layouts.partials.formError', ['key' => 'title'])
    </div>
    <div class="form-group form-float">
        <div class="form-line{{ $errors->first('description') ? ' error' : '' }}">
            <textarea name="description" id="description" cols="30" rows="5" class="form-control"
            >{{ old('description') }}</textarea>
            <label class="form-label">Category Description</label>
        </div>
        @include('layouts.partials.formError', ['key' => 'description'])
    </div>
    <hr>
    <div class="form-group text-center">
    	<button type="submit" class="btn btn-primary">Save Changes</button> &nbsp;&nbsp;
    	<button type="reset" class="btn btn-default">Reset</button>
    </div>
</form>