<form action="{{ url('members') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('code') ? ' error' : '' }}">
                    <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                    <label class="form-label">ID No. / Code</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'code'])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('name') ? ' error' : '' }}">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    <label class="form-label">Full Name</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'name'])
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('phone') ? ' error' : '' }}">
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    <label class="form-label" id="phone">Mobile Number</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'phone'])
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('address') ? ' error' : '' }}">
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    <label class="form-label">Residential Address</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'address'])
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-sm-6">
            <div class="form-group">
                <select class="form-control show-tick{{ $errors->first('type') ? ' error' : '' }}" name="type">
                    <option value="">-- Select member type --</option>
                    <option value="teacher" {{ old('type') == 'teacher' ? 'selected' : '' }}>TEACHER / FACULTY</option>
                    <option value="staff" {{ old('type') == 'staff' ? 'selected' : '' }}>OTHER STAFF</option>
                    <option value="student" {{ old('type') == 'student' ? 'selected' : '' }}>STUDENTS</option>
                    <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>OTHER TYPE</option>
                </select>
                @include('layouts.partials.formError', ['key' => 'type'])
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <select class="form-control show-tick{{ $errors->first('gender') ? ' error' : '' }}" name="gender">
                <option value="">-- Select member's gender/sex --</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male Member</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female Member</option>
            </select>
            @include('layouts.partials.formError', ['key' => 'gender'])
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group{{ $errors->first('avatar_image') ? ' error' : '' }}">
                <input type="file" name="avatar_image" value="{{ old('avatar_image') }}">
                @include('layouts.partials.formError', ['key' => 'avatar_image'])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg" value="Save Changes" style="margin-right: 30px;">
                <input type="reset" class="btn btn-warning btn-lg" value="Reset Member">
            </div>
        </div>
    </div>
</form>