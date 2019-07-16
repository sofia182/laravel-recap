<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('page_title', 'Ciao a tutti')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body>
      @include('partials._navbar')
      @yield('content')
      @include('partials._footer')
  </body>
</html>
