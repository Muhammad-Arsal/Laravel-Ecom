@extends('frontend.layouts.main')
@section('main_section')
    @php
        $user_id = Auth::guard('customer')->id();
        $order_details = DB::table('order_details')
            ->where('user_id', $user_id)
            ->latest()
            ->first();
        $country_name = DB::table('country_name')
            ->where('id', $order_details->country_id)
            ->first();
    @endphp
    <!--================ confirmation part start =================-->
    <section class="confirmation_part padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="confirmation_tittle">
                        <span>Thank you. Your order has been received.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>order info</h4>
                        <ul>
                            <li>
                                <p>order number</p><span>: {{ $order_details->order_number }}</span>
                            </li>
                            <li>
                                <p>data</p><span>: @php
                                    echo date('d M Y', strtotime($order_details->created_at));
                                @endphp</span>
                            </li>
                            <li>
                                <p>total</p><span>: USD 2210</span>
                            </li>
                            <li>
                                <p>mayment methord</p><span>: Check payments</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Billing Address</h4>
                        <ul>
                            <li>
                                <p>city</p><span>: {{ $order_details->city }}</span>
                            </li>
                            <li>
                                <p>country</p><span>: {{ $country_name->name }}</span>
                            </li>
                            <li>
                                <p>postcode</p><span>: {{ $order_details->postal_code }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>shipping Address</h4>
                        <ul>
                            <li>
                                <p>city</p><span>: {{ $order_details->city }}</span>
                            </li>
                            <li>
                                <p>country</p><span>: {{ $country_name->name }}</span>
                            </li>
                            <li>
                                <p>postcode</p><span>: {{ $order_details->postal_code }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ confirmation part end =================-->
@endsection
