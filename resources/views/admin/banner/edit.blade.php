@extends('admin.layouts.master')

@section('title', 'ویرایش بنر')

@section('content')

@include('admin.layouts.partials.errors')

    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Create Banner</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.banner.update', $banner) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter url ..." value="{{old('url', $banner->url)}}" required autofocus>
                </div>


                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control-file" required autofocus>
                    <img src="{{ asset($banner->image) }}" alt="" width="100" height="100" class="mt-2">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">update</button>
            </form>
        </section>
    </section>
@endsection