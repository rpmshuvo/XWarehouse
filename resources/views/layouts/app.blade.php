<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>
    @if (@isset($title))
    {{$title}}
    @else
      {{config('app.name')}}
    @endif
  </title>
  @include('inc.link')
</head>
<body>
  <div id="app ">
      @include('inc.navbar')
    <main py-0 role="main">
      @include('inc.message')
        <div class="row">
          <div class="col-3">
            @include('inc.sideMenu')
          </div>
          <div class="col-9 ">
            
            @yield('content')
          </div>
        </div>
    </main>
    <footer>
    </footer>
    @include('inc.script')
  </div>
</body>
</html>
