@extends('admin.layouts.master')

@section('title', 'ویرایش کاربر')

@section('content')


@include('admin.layouts.partials.errors')

    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Edit User</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="{{ route('admin.user.update', $user) }}">
                @csrf 
                @method('PUT')
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter username ..." value="{{old('name', $user->name)}}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email ..." value="{{old('email', $user->email)}}">
                </div>

                <div class="form-group">
                    <label for="permission">permission</label>
                    <select name="status" id="permission" class="form-control" required autofocus>
                        <option value="0" @if($user->status == 0) selected @endif>User</option>
                        <option value="1" @if($user->status == 1) selected @endif>Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">update</button>
            </form>
            <a role="button" class="btn btn-sm btn-secondary text-white" href="{{ route('admin.user.index') }}">back</a>

        </section>
    </section>
@endsection