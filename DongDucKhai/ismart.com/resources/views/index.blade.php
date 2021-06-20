@extends('layouts.index')
@section('content')
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            {{-- carousei slider --}}
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    @foreach ($sliders as $slider)
                        <div class="item">
                            <img class="img-carousei" src="{{ url($slider->thumbnail) }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- end carousei slider -->
            {{-- support --}}
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end support -->
            {{-- hot product --}}
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach ($hot_products as $hot_product)
                            <li>
                                <a href="{{ route('product.details',$hot_product->id) }}" class="thumb">
                                    <img class="thumb-img" src="{{ url($hot_product->thumbnail) }}">
                                </a>
                                <a href="{{ route('product.details',$hot_product->id) }}" class="product-name h-33">
                                    {{ $hot_product->name }}
                                </a>
                                <div class="price">
                                    <span class="new">
                                        {!! number_format($hot_product->price, 0, '', '.') !!}đ
                                    </span>
                                    @if ($hot_product->old_price != NULL)
                                        <span class="old">
                                            {!! number_format($hot_product->old_price, 0, '', '.') !!}đ
                                        </span>
                                    @endif
                                </div>
                                <div class="action clearfix">
                                    <a href="#" title="Thêm giỏ hàng" class="add-cart fl-left"
                                        data-url="{{ route('cart.ajax',$hot_product->id) }}">
                                            Thêm giỏ hàng
                                        </a>
                                    <a href="{{ route('product.details',$hot_product->id) }}" title="Chi tiết sản phẩm" class="buy-now fl-right">Thông tin</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- end hotProduct -->
            {{-- product list --}}
            <div class="section" id="list-product-wp">
                @foreach ($cats as $cat)
                    <div class="section-head clearfix">
                        <h3 class="section-title fl-left">{{ $cat->name }}</h3></h3>
                        <a href="{{ route('index.cat.product',$cat->id) }}" class="show-all fl-right">Xem tất cả: {{ $count["{$cat->id}"] }} sản phẩm</a>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            @foreach ($products["{$cat->id}"] as $product)
                                <li class="h-308">
                                    <a href="{{ route('product.details', $product->id) }}" class="thumb">
                                        <img class="thumb-img" src="{{ url($product->thumbnail) }}">
                                    </a>
                                    <a href="{{ route('product.details', $product->id) }}" class="product-name h-33">
                                        {{ $product->name }}
                                    </a>
                                    <div class="price">
                                        <span class="new">
                                            {!! number_format($product->price, 0, '', '.') !!}đ
                                        </span>
                                        <span class="old">
                                            @if ($product->old_price != NULL)
                                            {!! number_format($product->old_price, 0, '', '.') !!}đ
                                            @endif
                                        </span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="#" title="Thêm giỏ hàng" class="add-cart fl-left"
                                        data-url="{{ route('cart.ajax',$product->id) }}">
                                            Thêm giỏ hàng
                                        </a>
                                        <a href="{{ route('product.details', $product->id) }}" title="Thông tin chi tiết" class="buy-now fl-right">Thông tin</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
            <!-- endProduct -->
        </div>
        {{-- sidebar danh mục --}}
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                    @foreach($cats as $cat)
                        <li>
                            <a href="{{ route('index.cat.product',$cat->id) }}">{{ $cat->name}}</a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        {{-- end sidebar danh mục --}}
        {{-- sidebar hot product --}}
        <div class="sidebar fl-left">
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                    @foreach($hot_products as $hot_product)
                        <li class="clearfix">
                            <a href="{{ route('product.details',$hot_product->id) }}" class="thumb fl-left">
                                <img src="{{ url($hot_product->thumbnail) }}">
                            </a>
                            <div class="info fl-right">
                                <a href="{{ route('product.details',$hot_product->id) }}" class="product-name">
                                    {{ $hot_product->name }}
                                </a>
                                <div class="price">
                                    <span class="new">
                                        {!! number_format($hot_product->price, 0, '', '.') !!}đ
                                    </span>
                                    @if($hot_product->old_price != NULL)
                                    <span class="old">
                                        {!! number_format($hot_product->old_price, 0, '', '.') !!}đ
                                    </span>
                                    @endif
                                </div>
                                <a href="{{ route('cart.add',$hot_product->id) }}" title="Mua ngay" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a class="thumb">
                        <img class="ad" src="{{ url('public/images/banner-2.png')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
        {{-- sidebar hot product --}}
    </div>
</div>
@endsection
