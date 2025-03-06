@extends('AdminLayout.index')

@section('content')
<style>
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
{{-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'> --}}
<link rel='stylesheet' href='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css'>
{{-- <link rel='stylesheet' href='https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css'> --}}

<div class="my-profile-con p-2 p-lg-0 d-lg-flex justify-content-center">
    <div class="col-lg-9 col-md-12 pb-5">
        <div id="list-item-2" class="card fieldset border border-muted my-5">
            <!-- form: Change Password -->
            <span class="fieldset-tile text-muted bg-body">Change Password</span>
            <div class="card">
                <div class="card-body">
                    <form action="/changePassword" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input type="password" class="form-control pass-field form-control-lg" name="current_password" placeholder="CurrentPassword" autocomplete="off" minlength="6" required />
                                        <span id="basic-default-password2" class="input-group-text" style="cursor:pointer;">
                                            <i class="fa fa-eye-slash" style="font-size: 20px;" id="show-pass"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('current_password'))
                                        <div class="form-error">{{ $errors->first('current_password') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input type="password" class="form-control pass-field2 pass-new form-control-lg" name="password" placeholder="New Password" autocomplete="off" minlength="6" required />
                                        {{-- <span id="basic-default-password2" class="input-group-text" style="cursor:pointer;">
                                            <i class="fa fa-eye-slash" style="font-size: 20px;" id="show-pass"></i>
                                        </span> --}}
                                    </div>
                                    @if($errors->has('password'))
                                        <div class="form-error">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input type="password" class="form-control pass-field2 pass-new-confirm form-control-lg" name="password_confirmation" placeholder="Confirm New Password" autocomplete="off" minlength="6" required />
                                        <span id="basic-default-password2" class="input-group-text" style="cursor:pointer;">
                                            <i class="fa fa-eye-slash" style="font-size: 20px;" id="show-pass2"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('password_confirmation'))
                                        <div class="form-error">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>
                                <span class="text-muted small">Minimum 6 characters</span><br>
                                <span class="text-danger confirm-warning d-none small">New Password & Confirm New Password Doesn't Match!</span>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-lg change-pass-btn btn-primary" type="submit">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection