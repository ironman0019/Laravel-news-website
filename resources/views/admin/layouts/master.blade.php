<!doctype html>
<html lang="en">

<head>
    @include('admin.layouts.head-tag')
</head>

<body>

    @include('admin.layouts.partials.header')

    <div class="container-fluid">
        <div class="row">

            @include('admin.layouts.partials.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                @yield('content')

            </main>

        </div>
    </div>


    @include('admin.layouts.scripts')
    @include('admin.alerts.sweetalert.success')
    @include('admin.alerts.sweetalert.error')

</body>

</html>