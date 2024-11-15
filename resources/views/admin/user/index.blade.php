@extends('admin.layouts.master')

@section('title', 'ایندکس کاربرها')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> Users</h1>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of users</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>email</th>
                    <th>permission</th>
                    <th>created at</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->status == 0) not admin @endif
                            @if($user->status == 1) admin @endif 
                        </td>
                        <td>{{ \Morilog\Jalali\Jalalian::forge($user->created_at)->format('%A, %d %B %y') }}</td>
                        <td>
                            @if($user->status == 0)
                                <a role="button" class="btn btn-sm btn-success text-white" href="{{ route('admin.user.change-status', $user) }}">click to be admin</a>
                            @endif

                            @if($user->status == 1)
                                <a role="button" class="btn btn-sm btn-warning text-white" href="{{ route('admin.user.change-status', $user) }}">click not to be admin</a>
                            @endif

                            <a role="button" class="btn btn-sm btn-primary text-white" href="{{ route('admin.user.edit', $user) }}">edit</a>
                            <form action="{{ route('admin.user.destroy', $user) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger my-0 mx-1 text-white">delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

@endsection