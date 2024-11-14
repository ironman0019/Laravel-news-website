@extends('admin.layouts.master')

@section('title', 'ثبت تنظیمات وب سایت')

@section('content')

    @include('admin.layouts.partials.errors')

    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Set Web Setting</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.webSetting.set', $webSetting ? $webSetting->id : 0) }}" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title ..." value="{{ old('title', $webSetting ? $webSetting->title : null) }}" autofocus>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter description ..." value="{{ old('description', $webSetting ? $webSetting->description : null) }}" autofocus>
                </div>

                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input type="text" class="form-control" id="keywords" name="key_words" placeholder="Enter key-words seperate by comma ," value="{{ old('key_words', $webSetting ? $webSetting->key_words : null) }}" autofocus>
                </div>


                <div class="form-group">

                    <img style="width: 100px;" src="{{ asset($webSetting ? $webSetting->logo : null) }}" alt="Logo">
                    <hr/>

                    <label for="logo">Logo</label>
                    <input type="file" id="logo" name="logo" class="form-control-file" autofocus>
                </div>

                <div class="form-group">

                    <img style="width: 100px;" src="{{ asset($webSetting ? $webSetting->icon : null) }}" alt="icon">
                    <hr/>

                    <label for="icon">Icon</label>
                    <input type="file" id="icon" name="icon" class="form-control-file" autofocus>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">set</button>
            </form>
        </section>
    </section>

@endsection