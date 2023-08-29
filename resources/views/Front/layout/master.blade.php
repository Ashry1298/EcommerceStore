<!DOCTYPE html>
<html lang="en">

<head>
    @include('Front.layout.head')
</head>

<body class="animsition">
    <!-- Header -->
    @include('Front.layout.header')
    <!-- Sidebar -->
    @include('Front.layout.sidebar')
    <!-- Cart -->
    @include('Front.layout.cart')
    <!-- Slider -->
    <!-- Product -->
    <div class="main-content-page">
        <div class="content-container">
            @yield('content')
        </div>
    </div>
    <!-- Footer -->
    @include('Front.layout.footer')

    <!-- Back to top -->


    <!-- Modal1 -->
    @include('Front.inc.js')

</body>

</html>
