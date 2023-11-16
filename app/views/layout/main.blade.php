<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.style')
    <title>Document</title>
</head>
<body>
<div class="container">
    <header>
        <div class="header-main">
            <ul class="menu">
                <li><a href="{{ route('list-product') }}">Quản lý sản phẩm</a></li>
                <li><a href="{{ route('list-customer') }}">Quản lý khách hàng</a></li>
            </ul>
        </div>
    </header>
    <section class="content">
        @if(isset($_SESSION['errors']) && isset($_GET['msg']))
            <ul>
                @foreach($_SESSION['errors'] as $error)
                    <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if(isset($_SESSION['success']) && isset($_GET['msg']))
            <span style="color: green">{{ $_SESSION['success'] }}</span>
        @endif
       @yield('content')
    </section>
    <footer>
        <span>FPT POLYTECNIC</span>
    </footer>
</div>
</body>
</html>