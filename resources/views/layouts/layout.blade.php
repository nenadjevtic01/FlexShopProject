<!DOCTYPE html>
<html lang="en">

@include('fixed.head')
<body>
@include('fixed.topbar')
@include('fixed.navbar')

@yield('content')


@include('fixed.footer')
@include('fixed.scripts')
</body>

</html>
