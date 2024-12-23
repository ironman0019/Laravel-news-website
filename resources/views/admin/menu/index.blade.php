@extends('admin.layouts.master')

@section('title', 'ایندکس منو')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> Menus</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="{{ route('admin.menu.create') }}" class="btn btn-sm btn-success">create</a>
        </div>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of menus</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>url</th>
                    <th>parent ID</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>

                @foreach($menus as $menu)
                    <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                            {{$menu->name}}
                        </td>
                        <td>
                            {{$menu->url}}
                        </td>
                        <td>
                            {{$menu->parent ? $menu->parent->name : 'no parent'}}
                        </td>
                        <td>
                            <a role="button" class="btn btn-sm btn-primary text-white" href="{{ route('admin.menu.edit', $menu) }}">edit</a>
                            <form action="{{ route('admin.menu.destroy', $menu) }}" method="post" class="d-inline">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger text-white">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div>
            {{$menus->links()}}
        </div>
    </section>

@endsection