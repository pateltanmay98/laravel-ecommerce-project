@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change Password</h4><br><br>

                        @if(count($errors))
                            @foreach($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                            @endforeach
                        @endif

                        <form method="POST" action="{{ route('update.password') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                                <div class="col-sm-10">
                                    <input name="current_password" class="form-control" type="password">
                                </div>
                                @if ($errors->has('current_password'))
                                    <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                @endif
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input name="new_password" class="form-control" type="password">
                                </div>
                                @if ($errors->has('new_password'))
                                    <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                @endif
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input name="confirm_password" class="form-control" type="password">
                                </div>
                                @if ($errors->has('confirm_password'))
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                            </div> <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect" value="Change Password">

                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div>

@endsection