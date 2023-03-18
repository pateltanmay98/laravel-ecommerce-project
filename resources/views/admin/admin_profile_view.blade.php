@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-6">
                <div class="card"><br><br>
                    <center>
                        <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image)) ? url('storage/profile/'.$adminData->profile_image) : url('storage/profile/single_user.png') }}" alt="Card image cap">
                    </center>
                    <div class="card-body">
                        <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                        <hr>
                        <h4 class="card-title">User Email : {{ $adminData->email }}</h4>
                        <hr>
                        <h4 class="card-title">User Name : {{ $adminData->username }}</h4>
                        <hr>
                        <a href="{{ route('edit.profile') }}" class="btn btn-primary waves-effect waves-light">Edit Profile</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Row -->

    </div>
</div>

@endsection