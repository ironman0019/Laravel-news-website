@extends('admin.layouts.master')

@section('title', 'ایندکس تنظیمات وب سایت')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> Website Setting</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="{{ route('admin.webSetting.setIndex', $webSetting ? $webSetting->id : 0) }}" class="btn btn-sm btn-success">set web setting</a>
        </div>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>Website setting</caption>
            <thead>
                <tr>
                    <th>name</th>
                    <th>value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>title</td>
                    <td>
                        {{$webSetting ? $webSetting->title : null}}
                    </td>
                </tr>
                <tr>
                    <td>description</td>
                    <td>
                        {{Str::limit($webSetting ? $webSetting->description : null, 20)}}
                    </td>
                </tr>
                <tr>
                    <td>key words</td>
                    <td>
                        {{$webSetting ? $webSetting->key_words : null}}
                    </td>
                </tr>
                <tr>
                    <td>Logo</td>
                    <td><img src="{{ asset($webSetting ? $webSetting->logo : null) }}" alt="Logo" width="100px" height="100px"></td>
                </tr>
                <tr>
                    <td>Icon</td>
                    <td><img src="{{ asset($webSetting ? $webSetting->icon : null) }}" alt="Icon" width="100px" height="100px"></td>
                </tr>
            </tbody>
        </table>
    </section>

@endsection