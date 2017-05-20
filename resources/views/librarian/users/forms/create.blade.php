<form action="{{ url('users') }}" method="POST">
    {{ csrf_field() }}
    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('name') ? ' error' : '' }}">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    <label class="form-label">Full Name</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'name'])
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('username') ? ' error' : '' }}">
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                    <label class="form-label">User Name</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'username'])
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
            <select class="form-control show-tick{{ $errors->first('type') ? ' error' : '' }}" name="type">
                <option value="">-- Select user type --</option>
                <option value="librarian" {{ old('type') == 'librarian' ? 'selected' : '' }}>Librarian / Admin</option>
                <option value="assistant" {{ old('type') == 'assistant' ? 'selected' : '' }}>Assistant Librarian</option>
            </select>
            @include('layouts.partials.formError', ['key' => 'type'])
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <select class="form-control show-tick{{ $errors->first('gender') ? ' error' : '' }}" name="gender">
                <option value="">-- Select gender/sex --</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male User</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female User</option>
            </select>
            @include('layouts.partials.formError', ['key' => 'gender'])
            </div>
        </div>
    </div>
     <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('code') ? ' error' : '' }}">
                    <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                    <label class="form-label">ID NO. / CODE</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'code'])
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('dob') ? ' error' : '' }}">
                    <input type="text" class="form-control datepicker" name="dob" value="{{ old('dob') }}">
                    <label class="form-label">Date Of Birth</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'dob'])
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('password') ? ' error' : '' }}">
                    <input type="password" class="form-control" name="password">
                    <label class="form-label">Enter Password</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'password'])
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group form-float">
                <div class="form-line{{ $errors->first('password_confirmation') ? ' error' : '' }}">
                    <input type="password" class="form-control" name="password_confirmation">
                    <label class="form-label">Password Confirmation</label>
                </div>
                @include('layouts.partials.formError', ['key' => 'password_confirmation'])
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 text-center">
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg" value="Save Changes" style="margin-right: 30px;">
                <input type="reset" class="btn btn-warning btn-lg" value="Reset User">
            </div>
        </div>
    </div>
</form>