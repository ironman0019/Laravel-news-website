    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset($web_setting->icon) }}">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="{{ $web_setting->description }}">
    <!-- Meta Keyword -->
    <meta name="keywords" content="{{ $web_setting->key_words }}">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>@yield('title', $web_setting->title)</title>
    @include('app.layouts.styles')