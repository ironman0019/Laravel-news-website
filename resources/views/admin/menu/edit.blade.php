@extends('admin.layouts.master')

@section('title', 'ویرایش منو')

@section('content')

@include('admin.layouts.partials.errors')

    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Edit Menu</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">
            <form method="post" action="{{route('admin.menu.update', $menu)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name ..." value="{{old('name', $menu->name)}}" required>
                </div>

                <div class="form-group">
                    <label for="url">url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter url ..." value="{{old('url', $menu->url)}}" required>
                </div>

                <div class="form-group">
                    <label for="parent_id">parent ID</label>
                    <select name="parent_id" id="parent_id" class="form-control" autofocus>
                        <option value="{{null}}">No Parent</option>
                        @foreach($menus as $oneMenu)
                            <option value="{{$oneMenu->id}}" @if(old('parent_id', $menu->parent_id) == $oneMenu->id) selected @endif>
                                {{$oneMenu->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">update</button>
            </form>
        </section>
    </section>
@endsection