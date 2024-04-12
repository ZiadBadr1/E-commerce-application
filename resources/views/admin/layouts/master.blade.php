<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body id="page-top">

<div id="wrapper">
    @include('admin.layouts.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.layouts.navbar')
            <div class="container-fluid" id="container-wrapper">
                @yield('content')
            </div>
        </div>
        @include('admin.layouts.footer')

    </div>
</div>
@include('admin.layouts.js')
@stack('script')
</body>
</html>