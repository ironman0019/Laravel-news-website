<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('app.layouts.head-tag')
</head>

<body>

    @include('app.layouts.partials.header')

    <div class="site-main-container">
        @yield('content')
    </div>

    <!-- start footer Area -->
        @include('app.layouts.partials.footer')
    <!-- End footer Area -->

    @include('app.layouts.scripts')
    @include('admin.alerts.sweetalert.success')
</body>

</html>