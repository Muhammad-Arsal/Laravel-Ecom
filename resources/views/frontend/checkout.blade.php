@extends('frontend.layouts.main')
@section('main_section')
    @php
        if (Auth::guard('customer')->check()) {
            $sub_total_value = 0;
        
            $country_name = DB::table('country_name')->get();
        
            $userCartDetails = DB::table('user_cart')->get();
        
            foreach ($userCartDetails as $allItems) {
                $current_quantity = $allItems->quantity;
                $product_id = $allItems->product_id;
        
                if ($current_quantity == 0) {
                    DB::table('user_cart')
                        ->where('product_id', $product_id)
                        ->delete();
                }
            }
        }
    @endphp
    <!--================Checkout Area =================-->
    <section class="checkout_area padding_top">
        <div class="container">

            @if (!Auth::guard('customer')->check())
                <Button class="btn_3 my-5 form-control ">Login/Register</Button>
            @endif
            <div class="billing_details">
                <form action="{{ route('order.detail') }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-lg-8">
                            <h3>Billing Details</h3>
                            <div class="row contact_form">
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="first" name="f_name"
                                        placeholder="First Name" />

                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="last" name="l_name"
                                        placeholder="Last Name" />

                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="number" name="phone"
                                        placeholder="Phone Number" />

                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="email" name="email" id="" class="form-control"
                                        placeholder="email">

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <select class="country_select" name="country_id">
                                        @forelse ($country_name as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @empty
                                        @endforelse

                                    </select>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input placeholder="Address" type="text" class="form-control" id="add1"
                                        name="address" />
                                </div>

                                <div class="col-md-12 form-group p_star">
                                    <input placeholder="City/Town" type="text" class="form-control" id="city"
                                        name="city" />
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="zip" name="postal"
                                        placeholder="Postcode/ZIP" />
                                </div>

                                {{-- <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h3>Shipping Details</h3>
                                        <input type="checkbox" id="f-option3" name="selector" />
                                        <label for="f-option3">Ship to a different address?</label>
                                    </div>
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Your Order</h2>
                                <ul class="list">
                                    <li>
                                        <a href="#">Product
                                            <span>Total</span>
                                        </a>
                                    </li>
                                    @php
                                        if (Auth::guard('customer')->check()) {
                                            $user_id = Auth::guard('customer')->id();
                                        
                                            $user_cart_details = DB::table('user_cart')
                                                ->where('user_id', $user_id)
                                                ->get();
                                        }
                                        
                                    @endphp
                                    @forelse ($user_cart_details as $item)
                                        @php
                                            $product_id = $item->product_id;
                                            
                                            $product_name = DB::table('products')
                                                ->where('id', $product_id)
                                                ->first();
                                            
                                            $quantity = $item->quantity;
                                            
                                            $sale_price = DB::table('supplier_products')
                                                ->where('product_id', $product_id)
                                                ->first();
                                            
                                            $total = $quantity * $sale_price->sale_price;
                                            
                                            $sub_total_value += $total;
                                        @endphp
                                        <li>
                                            <a href="#">{{ $product_name->product_name }}
                                                <span class="middle">x{{ $quantity }}</span>
                                                <span class="last">${{ $total }}</span>
                                            </a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">Subtotal
                                            <span>${{ $sub_total_value }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Coupon Reduction
                                            <span>$0</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Total
                                            <span>${{ $sub_total_value }}</span>
                                        </a>
                                    </li>
                                </ul>
                                {{-- <a style="font-size: 12px" class="btn_3" href="#">Proceed to Confirmation</a> --}}
                                <button class="btn_3 pb-3" style="font-size: 12px; line-height: 17px;"
                                    type="submit">Proceed
                                    to
                                    confirmation</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection

@push('JS')
    <script>
        $(document).ready(function() {


        });
    </script>
@endpush
