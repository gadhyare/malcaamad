@include('admin.layouts.header')

<body>
    <div class="main-container d-flex">
        @include('admin.layouts.sidebar')
        <div class="content ">
            @include('admin.layouts.top-nav')
            @yield('content')
        </div>
    </div>
    @include('admin.layouts.footer')
