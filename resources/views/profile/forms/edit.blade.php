<div class="row clearfix">
    <div class="col-md-7">
        <div class="card">
            <div class="body">
                <form action="{{ url('profile/edit/') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <input type="hidden" name="id" value="{{ $profile->id }}">
                    <legend>Update/Edit Profile informations</legend>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line{{ $errors->first('name' ? ' error' : '') }}">
                                    <input type="text" class="form-control" name="name" 
                                        value="{{ old('name') ? : $profile->name }}"
                                    >
                                    <label class="form-label">Full Name</label>
                                </div>
                                @include('layouts.partials.formError', ['key' => 'name'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line{{ $errors->first('username') ? ' error' : '' }}">
                                    <input type="text" class="form-control"  name="username" 
                                        value="{{ old('username') ? : $profile->username }}"
                                    >
                                    <label class="form-label">User Name</label>
                                </div>
                                @include('layouts.partials.formError', ['key' => 'username'])
                            </div>
                        </div>
                    </div>
                
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line{{ $errors->first('email') ? ' error' : '' }}">
                                    <input type="text" class="form-control" name="email"
                                        value="{{ old('email') ? : $profile->email }}"
                                    >
                                    <label class="form-label">Email Address</label>
                                </div>
                                @include('layouts.partials.formError', ['key' => 'email'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line focused {{ $errors->first('phone') ? 'error' : '' }}">
                                    <input type="number" class="form-control" id="phone" name="phone" 
                                        value="{{ old('phone') ? : $profile->phone }}"
                                    >
                                    <label class="form-label" id="phone">Mobile Number</label>
                                </div>
                                @include('layouts.partials.formError', ['key' => 'phone'])
                            </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix" >
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line{{ $errors->first('address') ? ' error' : '' }}">
                                    <input type="text" class="form-control" name="address" 
                                        value="{{ old('address') ? : $profile->address }}"
                                    >
                                    <label class="form-label">Residential Address</label>
                                </div>
                                @include('layouts.partials.formError', ['key' => 'address'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line{{ $errors->first('dob') ? ' error' : '' }}">
                                    <input type="text" class="form-control datepicker" name="dob" 
                                        value="{{ old('dob') ? : $profile->dob->format('Y-m-d')  }}" 
                                    >
                                    <label class="form-label">DOB</label>
                                </div>    
                                @include('layouts.partials.formError', ['key' => 'dob'])
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="body">
                <form action="{{ url('password/reset') }}" method="POST">
                    {{ csrf_field() }}
                    <legend>Change your login Password</legend>
                    <div class="form-group form-float">
                        <div class="form-line{{ $errors->first('current_password') ? ' error' : '' }}">
                            <input type="password" class="form-control" name="current_password">
                            <label class="form-label">Old Password</label>
                        </div>
                        @include('layouts.partials.formError', ['key' => 'current_password'])
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="current_password_confirmation">
                            <label class="form-label">Confirm Old Password</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line{{ $errors->first('new_password') ? ' error' : '' }}">
                            <input type="password" class="form-control" name="new_password">
                            <label class="form-label">New Password</label>
                        </div>
                        @include('layouts.partials.formError', ['key' => 'new_password'])
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="new_password_confirmation">
                            <label class="form-label">Confirm New Password</label>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Change Password</button>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>    
