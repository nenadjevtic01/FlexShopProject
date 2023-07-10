<!DOCTYPE html>
<html lang="en">
@include('fixed.admins.head')
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    @include('fixed.admins.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @yield('content')
    @include('fixed.admins.footer')
    </div>
    <!-- End of Content Wrapper -->

</div>
@include('fixed.admins.scripts')
</body>

</html>
