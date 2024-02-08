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
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" value="{{ $homeSlide->title }}" id="title">
                                </div>
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input name="short_title" class="form-control" type="text" value="{{ $homeSlide->short_title }}" id="short_title">
                                </div>
                                @if ($errors->has('short_title'))
                                    <span class="text-danger">{{ $errors->first('short_title') }}</span>
                                @endif
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input name="video_url" class="form-control" type="text" value="{{ $homeSlide->video_url }}" id="video_url">
                                </div>
                                @if ($errors->has('video_url'))
                                    <span class="text-danger">{{ $errors->first('video_url') }}</span>
                                @endif
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="home_slide" class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="col-sm-10">
                                    <input name="home_slide" class="form-control" type="file" id="home_slide" value="{{ $homeSlide }}">
                                </div>
                                @if ($errors->has('home_slide'))
                                    <span class="text-danger">{{ $errors->first('home_slide') }}</span>
                                @endif
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="display_image" class="rounded avatar-lg" src="{{ (!empty($homeSlide->home_slide)) ? url('storage/home_slider/'.$homeSlide->home_slide) : url('storage/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div> <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect" value="Update Slider">

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