@extends('frontend.layouts.main')
@section('main_section')
    <!--================Cart Area =================-->
    <section class="cart_area padding_top">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                if (Auth::guard('customer')->check()) {
                                    $user_id = Auth::guard('customer')->id();
                                
                                    $user_cart_prodcuts = \DB::table('user_cart')
                                        ->where('user_id', $user_id)
                                        ->get();
                                }
                            @endphp
                            @forelse ($user_cart_prodcuts as $item)
                                @php
                                    $product_details = \DB::table('products')
                                        ->where('id', $item->product_id)
                                        ->first();
                                    $product_price = \DB::table('supplier_products')
                                        ->where('product_id', $item->product_id)
                                        ->first();
                                @endphp
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="" alt="" />
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $product_details->product_name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ $product_price->sale_price }}$</h5>
                                    </td>
                                    <td>
                                        <div class="">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-2">

                                                        <input type="button" data-id="" onclick="" value="-"
                                                            class="minus" />
                                                    </div>
                                                    <div class="col-8">

                                                        <input type="text" readonly name="quantity" value=""
                                                            maxlength="2" size="1" max="" id="number" />
                                                    </div>
                                                    <div class="col-2">

                                                        <input type="button" data-stock="" data-id="" onclick=""
                                                            value="+" class="plus" />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>$720.00</h5>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                            <tr class="bottom_button">
                                <td>
                                    <a class="btn_1" href="#">Update Cart</a>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="cupon_text float-right">
                                        <a class="btn_1" href="#">Close Coupon</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>$2160.00</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li>
                                                <a href="#">Flat Rate: $5.00</a>
                                            </li>
                                            <li>
                                                <a href="#">Free Shipping</a>
                                            </li>
                                            <li>
                                                <a href="#">Flat Rate: $10.00</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Local Delivery: $2.00</a>
                                            </li>
                                        </ul>
                                        <h6>
                                            Calculate Shipping
                                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        </h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select section_bg">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>
                                        <input type="text" placeholder="Postcode/Zipcode" />
                                        <a class="btn_1" href="#">Update Details</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="#">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
