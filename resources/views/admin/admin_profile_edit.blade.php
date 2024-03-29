@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edi Profile Page</h4>

                        <form method="POST" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{ $editData->name }}" id="name">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">User Email</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" value="{{ $editData->email }}" id="email">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input name="username" class="form-control" type="text" value="{{ $editData->username }}" id="username">
                                </div>
                                @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input name="user_image" class="form-control" type="file" id="user_image">
                                </div>
                                @if ($errors->has('user_image'))
                                    <span class="text-danger">{{ $errors->first('user_image') }}</span>
                                @endif
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="display_image" class="rounded avatar-lg" src="{{ (!empty($editData->profile_image)) ? url('storage/profile/'.$editData->profile_image) : url('storage/profile/single_user.png') }}" alt="Card image cap">
                                </div>
                            </div> <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect" value="Update Profile">

                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div>

@endsection

@section('custom-scripts')

<script type="text/javascript">
    $(document).ready(function() {
        $('#user_image').change(function(e) {
            var render = new FileReader();
            render.onload = function(e) {
                $('#display_image').attr('src', e.target.result);
            }
            render.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection