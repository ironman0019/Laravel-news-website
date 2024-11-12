@extends('admin.layouts.master')

@section('title', 'ساخت دسته بندی')

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')

@include('admin.layouts.partials.errors')

<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Create Article</h1>
</section>

<section class="row my-3">
    <section class="col-12">

        <form method="post" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title ..." required autofocus>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required autofocus>

                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id')==$category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control-file" required autofocus>
            </div>

            <div class="form-group">
                <label for="published_at">published at</label>
                <input type="text" class="form-control d-none" id="published_at" name="published_at" required autofocus>
                <input type="text" class="form-control" id="published_at_view" required autofocus>
            </div>

            <div class="form-group">
                <label for="summary">summary</label>
                <textarea class="form-control" id="summary" name="summary" placeholder="summary ..." rows="3" required autofocus></textarea>
            </div>

            <div class="form-group">
                <label for="body">body</label>
                <textarea class="form-control" id="body" name="body" placeholder="body ..." rows="5" required autofocus></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">store</button>
        </form>
    </section>
</section>
@endsection


@section('scripts')
@parent
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script>
    CKEDITOR.replace('body');
    CKEDITOR.replace('summary');
</script>
<script>
    $(document).ready(function() {
        $("#published_at_view").persianDatepicker({
            format: "YYYY/MM/DD",
            altField: '#published_at',
            autoClose: true
        });
    })
</script>
@endsection