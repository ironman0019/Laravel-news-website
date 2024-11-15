@extends('admin.layouts.master')

@section('title', 'ایندکس دسته بندی ها')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
    <h1 class="h5 "><i class="fas fa-newspaper "></i> Categories</h1>
    <div class="btn-toolbar mb-2 mb-md-0 ">
        <a role="button " href="{{ route('admin.category.create') }}" class="btn btn-sm btn-success ">create
        </a>
    </div>
</div>
<div class="table-responsive ">
    <table class="table table-striped table-sm ">
        <caption>List of categories</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>setting</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a role="button" href="{{ route('admin.category.edit', $category) }}" class="btn btn-sm btn-info my-0 mx-1 text-white">update</a>
                        <form action="{{ route('admin.category.destroy', $category) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger my-0 mx-1 text-white">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection