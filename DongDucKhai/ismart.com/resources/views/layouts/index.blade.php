<!DOCTYPE html>
<html>

<head>
    <title>ISMART STORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/ico" href="{{ url('public/images/ismart.ico') }}" />
    <link href="{{ url('public/css/bootstrap/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/reset.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/css/carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/css/carousel/owl.theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/responsive.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ url('public/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('public/js/elevatezoom-master/jquery.elevatezoom.js') }}" type="text/javascript"></script>
    <script src="{{ url('public/js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('public/js/carousel/owl.carousel.js') }}" type="text/javascript"></script>
    <script src="{{ url('public/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ url('public/js/app.js') }}" type="text/javascript"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0"
        nonce="tGIhkK89"></script>

</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="{{ route('index.home') }}" title="">Trang ch???</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.product') }}" title="">S???n ph???m</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.blog') }}" title="">Blog</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.page', 1) }}" title="">Gi???i thi???u</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.page', 2) }}" title="">H???i ????p</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="{{ url('/') }} " title="" id="logo" class="fl-left"><img
                                src="{{ url('public/images/logo.png') }}" /></a>
                        <div id="search-wp" class="fl-left">
                            <form class="form-search" method="GET" action="{{ route('index.search') }}">
                                <input type="text" name="keyword" id="s" class=""
                                    placeholder="Nh???p t??? kh??a t??m ki???m t???i ????y!" autocomplete="off">
                                <button type="submit" id="sm-s">T??m ki???m</button>
                                <div id="data-list"></div>
                            </form>
                            {{ csrf_field() }}
                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">T?? v???n</span>
                                <span class="phone">0987.654.321</span>
                            </div>
                            <div id="cart-wp" class="fl-right">
                                <a href="{{ route('cart.show') }}" id="btn-cart" style="color:#fdfafa">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    @if (Cart::count() > 0)
                                        <span id="num">{{ Cart::count() }}</span>
                                    @endif
                                </a>
                                @if (Cart::count() > 0)
                                    <div id="dropdown">
                                        <p class="desc">
                                            C?? <span>{{ Cart::count() }}</span> s???n ph???m trong gi??? h??ng
                                        </p>
                                        <ul class="list-cart">
                                            @foreach (Cart::content() as $row)
                                                <li class="clearfix">
                                                    <a href="{{ route('product.details', $row->id) }}"
                                                        class="thumb fl-left">
                                                        <img src="{{ url($row->options->thumbnail) }}" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="{{ route('product.details', $row->id) }}"
                                                            class="product-name">
                                                            {{ $row->name }}
                                                        </a>
                                                        <p class="price">
                                                            {!! number_format($row->price, 0, '', '.') !!}??
                                                        </p>
                                                        <p class="qty">S??? l?????ng: <span>{{ $row->qty }}</span></p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">T???ng:</p>
                                            <p class="price fl-right">{{ Cart::total() }}??</p>
                                        </div>
                                        <div class="action-cart clearfix">
                                            <a href="{{ route('cart.show') }}" title="Gi??? h??ng"
                                                class="view-cart fl-left">
                                                Gi??? h??ng
                                            </a>
                                            <a href="{{ route('checkout') }}" title="Thanh to??n"
                                                class="checkout fl-right">
                                                Thanh to??n
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                {{-- main content --}}
                @yield('content');
            </div>
            <div id="footer-wp">
                <div id="foot-body">
                    <div class="wp-inner clearfix">
                        <div class="block" id="info-company">
                            <h3 class="title">ISMART</h3>
                            <p class="desc">ISMART lu??n cung c???p lu??n l?? s???n ph???m ch??nh h??ng c?? th??ng tin r?? r??ng, ch??nh
                                s??ch ??u ????i c???c l???n cho kh??ch h??ng c?? th??? th??nh vi??n.</p>
                            <div id="payment">
                                <div class="thumb">
                                    <img src="public/images/img-foot.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="block menu-ft" id="info-shop">
                            <h3 class="title">Th??ng tin c???a h??ng</h3>
                            <ul class="list-item">
                                <li>
                                    <p>37 - ??u C?? - T??n B??nh - tp HCM</p>
                                </li>
                                <li>
                                    <p>0987.654.321 - 0989.989.989</p>
                                </li>
                                <li>
                                    <p>ISMART@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="block menu-ft policy" id="info-shop">
                            <h3 class="title">Ch??nh s??ch mua h??ng</h3>
                            <ul class="list-item">
                                <li>
                                    <a href="{{ route('index.page', 3) }}">Quy ?????nh - ch??nh s??ch</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.page', 4) }}">Ch??nh s??ch b???o h??nh - ?????i tr???</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.page', 5) }}">Ch??nh s??ch h???i vi???n</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.page', 6) }}">Giao h??ng - l???p ?????t</a>
                                </li>
                            </ul>
                        </div>
                        <div class="block" id="newfeed">
                            <div class="fb-page"
                                data-href="https://www.facebook.com/%C4%90i%E1%BB%87n-m%C3%A1y-Ismart-104204065133418"
                                data-tabs="" data-width="" data-height="" data-small-header="false"
                                data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote
                                    cite="https://www.facebook.com/%C4%90i%E1%BB%87n-m%C3%A1y-Ismart-104204065133418"
                                    class="fb-xfbml-parse-ignore"><a
                                        href="https://www.facebook.com/%C4%90i%E1%BB%87n-m%C3%A1y-Ismart-104204065133418">??i???n
                                        m??y Ismart</a></blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="foot-bot">
                <div class="wp-inner">
                    <p id="copyright">?? B???n quy???n thu???c v??? ?????ng ?????c Kh???i</p>
                </div>
            </div>
            <div id="btn-top">
                <img src="{{ url('public/images/icon-to-top.png') }}" />
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    {{-- Th??ng b??o sweetAlert --}}
    @if (Session::has('status'))
        <script>
            swal("Th??nh c??ng !", "{{ session('status') }}", "success", {
                button: "OK",
            });
        </script>
    @endif
    @if (Session::has('thankYou'))
        <script>
            swal("Mua h??ng th??nh c??ng !", "{{ session('thankYou') }}", "success", {
                button: "OK",
            });
        </script>
    @endif
    {{-- Select qu???n huy???n --}}
    <script>
        $(document).ready(function() {
            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('location') }}",
                        method: "POST",
                        data: {
                            value: value,
                            _token: _token,
                            dependent: dependent
                        },
                        success: function(result) {
                            $('#' + dependent).html(result);
                        }
                    })
                }
            });
        });
    </script>
    {{-- G???i ?? t??m ki???m --}}
    <script>
        $(document).ready(function() {
            $('input#s').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    //console.log(query);
                    var _token = $('input[name="_token"]').val();
                    //console.log(_token);
                    $.ajax({
                        url: "{{ route('index.autocomplete') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#data-list').fadeIn();
                            $('#data-list').html(data);
                        }
                    })
                } else {
                    $('#data-list').fadeOut();
                }
            });
            $(document).on('click', '.suggest-li', function() {
                $('input#s').val($(this).text());
                $('#data-list').fadeOut();
            });
        });
    </script>

</body>

</html>
