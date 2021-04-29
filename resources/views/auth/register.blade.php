<!-- registration.blade.php -->

@extends('master.master')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <form class="register_form">
                <div class="card shadow mb-4">
                    <div class="car-header bg-primary pt-2">
                        <div class="card-title font-weight-bold text-white text-center"> Register Here </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name"> First Name </label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name" value="{{ old('first_name') }}"/>
                            <small class="text-danger" id="first_name_error">First Name Cannot Be Empty</small>
                        </div>

                        <div class="form-group">
                            <label for="last_name"> Last Name </label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name" value="{{ old('last_name') }}"/>
                            <small class="text-danger" id="last_name_error">Last Name Cannot Be Empty</small>
                        </div>

                        <div class="form-group">
                            <label for="email"> E-mail </label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter E-mail" value="{{ old('email') }}"/>
                            <small class="text-danger" id="email_error">Email Cannot Be Empty</small>
                            <small class="text-danger email_error"></small>
                        </div>

                        <div class="form-group">
                            <label for="profile">Profile</label>
                            <input type="file" name="profile" id="profile" class="form-control-file" />
                        </div>

                        <div class="form-group">
                            <label for="password"> Password </label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="{{ old('password') }}"/>
                            <small class="text-danger" id="password_error">Password Cannot Be Empty</small>
                            <small class="text-danger password_error"></small>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password"> Confirm Password </label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" value="{{ old('confirm_password') }}">
                            <small class="text-danger" id="confirm_password_error">Password Cannot Be Empty</small>
                            <small class="text-danger confirm_password_error"></small>
                        </div>
                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-primary"> Register </button>
                    <p class="float-right mt-2"> Already have an account?  <a href="{{ url('login')}}" class="text-primary"> Login </a> </p>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection