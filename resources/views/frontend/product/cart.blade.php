@extends('frontend.layouts.master')

@section('content')
    <div class="body__overlay"></div>
    <!-- Start Offset Wrapper -->
    <div class="offset__wrapper">
        <!-- Start Search Popap -->
        <div class="search__area">
            <div class="container" >
                <div class="row" >
                    <div class="col-md-12" >
                        <div class="search__inner">
                            <form action="#" method="get">
                                <input placeholder="Search here... " type="text">
                                <button type="submit"></button>
                            </form>
                            <div class="search__close__btn">
                                <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search Popap -->
        <!-- Start Offset MEnu -->
        <div class="offsetmenu">
            <div class="offsetmenu__inner">
                <div class="offsetmenu__close__btn">
                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                </div>
                <div class="off__contact">
                    <div class="logo">
                        <a href="index.html">
                            <img src="images/logo/logo.png" alt="logo">
                        </a>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
                </div>
                <ul class="sidebar__thumd">
                    <li><a href="#"><img src="images/sidebar-img/1.jpg" alt="sidebar images"></a></li>
                    <li><a href="#"><img src="images/sidebar-img/2.jpg" alt="sidebar images"></a></li>
                    <li><a href="#"><img src="images/sidebar-img/3.jpg" alt="sidebar images"></a></li>
                    <li><a href="#"><img src="images/sidebar-img/4.jpg" alt="sidebar images"></a></li>
                    <li><a href="#"><img src="images/sidebar-img/5.jpg" alt="sidebar images"></a></li>
                    <li><a href="#"><img src="images/sidebar-img/6.jpg" alt="sidebar images"></a></li>
                    <li><a href="#"><img src="images/sidebar-img/7.jpg" alt="sidebar images"></a></li>
                    <li><a href="#"><img src="images/sidebar-img/8.jpg" alt="sidebar images"></a></li>
                </ul>
                <div class="offset__widget">
                    <div class="offset__single">
                        <h4 class="offset__title">Language</h4>
                        <ul>
                            <li><a href="#"> Engish </a></li>
                            <li><a href="#"> French </a></li>
                            <li><a href="#"> German </a></li>
                        </ul>
                    </div>
                    <div class="offset__single">
                        <h4 class="offset__title">Currencies</h4>
                        <ul>
                            <li><a href="#"> USD : Dollar </a></li>
                            <li><a href="#"> EUR : Euro </a></li>
                            <li><a href="#"> POU : Pound </a></li>
                        </ul>
                    </div>
                </div>
                <div class="offset__sosial__share">
                    <h4 class="offset__title">Follow Us On Social</h4>
                    <ul class="off__soaial__link">
                        <li><a class="bg--twitter" href="#"  title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>

                        <li><a class="bg--instagram" href="#" title="Instagram"><i class="zmdi zmdi-instagram"></i></a></li>

                        <li><a class="bg--facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>

                        <li><a class="bg--googleplus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a></li>

                        <li><a class="bg--google" href="#" title="Google"><i class="zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Offset MEnu -->
        <!-- Start Cart Panel -->
        <div class="shopping__cart">
            <div class="shopping__cart__inner">
                <div class="offsetmenu__close__btn">
                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                </div>
                <div class="shp__cart__wrap">
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="images/product/sm-img/1.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                            <span class="quantity">QTY: 1</span>
                            <span class="shp__price">$105.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="images/product/sm-img/2.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">Brone Candle</a></h2>
                            <span class="quantity">QTY: 1</span>
                            <span class="shp__price">$25.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                </div>
                <ul class="shoping__total">
                    <li class="subtotal">Subtotal:</li>
                    <li class="total__price">$130.00</li>
                </ul>
                <ul class="shopping__btn">
                    <li><a href="cart.html">View Cart</a></li>
                    <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                </ul>
            </div>
        </div>
        <!-- End Cart Panel -->
    </div>
    <!-- End Offset Wrapper -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Cart</h2>
                            <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Cart</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- cart-main-area start -->
    <div class="cart-main-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @auth
                                @forelse(auth()->user()->carts as $cart)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="product-thumbnail"><a href="#"><img src="images/product/4.png" alt="product img" /></a></td>
                                        <td class="product-name"><a href="#">{{ $cart->product->name }}</a></td>
                                        <td class="product-price"><input type="number" class="price" value="{{ $cart->price }}" disabled/></td>
                                        <td class="product-quantity"><input type="number" class="quantity" value="{{ $cart->quantity }}" min="1" max="{{ $cart->product->stock }}"/></td>
                                        <td class="product-subtotal"><input type="number" class="grand_total" value="{{ $cart->grand_total }}" disabled/></td>
                                        <td class="product-remove">
                                            <a class="remove_item" href="#">X</a>
                                            <input type="hidden" class="product" value="{{ $cart->product->id }}" disabled/>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Your cart is empty</td>
                                    </tr>
                                @endforelse
                                @else
                                    <tr>
                                        <td colspan="7">Your cart is empty</td>
                                    </tr>
                                @endauth
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="buttons-cart">
                                <input type="submit" value="Update Cart" />
                                <a href="#">Continue Shopping</a>
                            </div>

                            <div class="coupon">
                                <h3>Coupon</h3>
                                <form method="POST" action="{{ route('cart.apply_coupon') }}">
                                    @csrf
                                    <p>Enter your coupon code if you have one.</p>
                                    <input type="text" name="code" placeholder="Coupon code" />
                                    <button type="submit" class="btn btn-success btn-md">Apply Coupon</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="cart_totals">
                                <h2>Cart Totals</h2>
                                <table>
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            @php
                                                $grand_total = auth()->user()->carts()->sum('grand_total');
                                                if(auth()->user()->coupon()->exists()){
                                                    $grand_total = $grand_total - auth()->user()->coupon->discount_amount;
                                                }
                                            @endphp
                                            <td>
                                                <span>
                                                    @auth
                                                        Rs. <input type="number" class="sub_total" value="{{ $grand_total }}" disabled/>
                                                    @else
                                                        Rs.0
                                                    @endauth
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <ul id="shipping_method">
                                                    <li>
                                                        <input type="radio" name="shipping" value="flat" class="shipping_type">
                                                        <label>
                                                            Flat Rate: <span class="amount">Rs. 50.00</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="shipping" value="free" class="shipping_type" checked>
                                                        <label>
                                                            Free Shipping
                                                        </label>
                                                    </li>
                                                    <li></li>
                                                </ul>
                                                <p><a class="shipping-calculator-button" href="#">Calculate Shipping</a></p>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">Rs. @auth {{ auth()->user()->carts()->sum('grand_total') }} @else 0 @endauth</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="checkout.html">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $( document ).ready(function() {

        $('.shipping_type').change(function(){
            let shipping_type = $(this).val();
            if(shipping_type == 'flat'){
                $('.amount').html(100);
            }
        });

        $('.quantity').on('change keyup',function(){
            let quantity = $(this).val();
            let price =  $(this).parents('tr').find('.price').val();
            let grand_total_element = $(this).parents('tr').find('.grand_total');
            let total = quantity * price;
            grand_total_element.val(total);

            let product_id =  $(this).parents('tr').find('.product').val();

            $.ajax({
                url: "{{route('product.update_cart')}}",
                data: {_token: "{{csrf_token()}}", product_id: product_id, quantity : quantity},
                dataType: "JSON",
                method: "POST",
                success: function(resp) {

                    $('.sub_total').val(resp.grand_total);

                },
            });
        });

        // script
        $('.remove_item').on('click', function(e) {
            e.preventDefault();
            let row =  $(this);

            let product_id = $(this).next().val();

            $.ajax({
                url: "{{route('product.delete_cart')}}",
                data: {_token: "{{csrf_token()}}", product_id: product_id},
                dataType: "JSON",
                method: "POST",
                success: function(resp) {

                    row.parents('tr').remove();

                    $('.sub_total').val(resp.grand_total);

                },
            });
        });



    });

</script>


@endsection





