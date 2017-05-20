<form action="{{ url('books') }}" method="POST">
    {{ csrf_field() }}
    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('isbn') ? ' error' : '' }}">
                    <input type="text" class="form-control" name="isbn" value="{{ old('isbn') }}">
                    <label class="form-label">ISBN / Code</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'isbn'])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('title') ? ' error' : '' }}">
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    <label class="form-label">Book Name/Title</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'title'])
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('total_copy') ? ' error' : '' }}">
                    <input type="integer" class="form-control" name="total_copy" value="{{ old('total_copy') }}">
                    <label class="form-label">Total Copies</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'total_copy'])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('available_copy') ? ' error' : '' }}">
                    <input type="integer" class="form-control" name="available_copy" value="{{ old('available_copy') }}">
                    <label class="form-label">Available Copies</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'available_copy'])
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-sm-6">
            <div class="form-group">
                <select class="form-control show-tick{{ $errors->first('author_id') ? ' error' : '' }}" name="author_id">
                    <option value="">-- Select book author --</option>
                    @foreach($authors->all() as $author)
                    <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                    @endforeach
                </select>
                @include('layouts.partials.formError', ['key' => 'author_id'])
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <select class="form-control show-tick{{ $errors->first('category_id') ? ' error' : '' }}" name="category_id">
                <option value="">-- Select book category --</option>
                @foreach($categories->all() as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->title }}
                    </option>
                    @endforeach
            </select>
            @include('layouts.partials.formError', ['key' => 'category_id'])
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('location') ? ' error' : '' }}">
                    <input type="text" class="form-control" name="location" value="{{ old('location') }}">
                    <label class="form-label">Book Location</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'location'])
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary btn-lg" value="Save Changes" style="margin-right: 30px;">
                <input type="reset" class="btn btn-warning btn-lg" value="Reset Member">
            </div>
        </div>
    </div>
</form>