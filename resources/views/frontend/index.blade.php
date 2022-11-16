 @extends('frontend.layouts.main')
 @section('main_section')
     <!-- product_list start-->
     <section class="product_list section_padding">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-lg-12">
                     <div class="section_tittle text-center">
                         <h2>awesome <span>shop</span></h2>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-12">
                     <div class="product_list_slider owl-carousel">
                         <div class="single_product_list_slider">
                             <div class="row align-items-center justify-content-between">
                                 @forelse ($allProducts as $item)
                                     @php
                                         $relativeImage = \DB::table('product_images')
                                             ->where('product_id', $item->id)
                                             ->first();
                                         
                                         $relativePrice = \DB::table('supplier_products')
                                             ->where('product_id', $item->id)
                                             ->first();
                                     @endphp
                                     <div class="col-lg-3 col-sm-6">
                                         <div class="single_product_item">
                                             <img src="{{ asset('frontend/prodImages' . '/' . $relativeImage->image_name) }}"
                                                 alt="">
                                             <div class="single_product_text">
                                                 <h4>{{ $item->product_name }}</h4>
                                                 @if (!empty($relativePrice->sale_price))
                                                     <h3>${{ $relativePrice->sale_price }}</h3>
                                                 @else
                                                     <h3>Not Avaliable</h3>
                                                 @endif

                                                 <a href="#" class="add_cart" data-product_id="{{ $item->id }}">+
                                                     add to cart
                                                     <i @if (Auth::guard('customer')->check()) style="display: block" @else style="display: none" @endif
                                                         class="ti-heart heart"></i>
                                                 </a>
                                             </div>
                                         </div>
                                     </div>
                                 @empty
                                 @endforelse

                             </div>
                         </div>
                         {{-- <div class="single_product_list_slider">
                             <div class="row align-items-center justify-content-between">
                                 <div class="col-lg-3 col-sm-6">
                                     <div class="single_product_item">
                                         <img src="{{ asset('frontend/img/product/product_1.png') }}" alt="">
                                         <div class="single_product_text">
                                             <h4>Quartz Belt Watch</h4>
                                             <h3>$150.00</h3>
                                             <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-3 col-sm-6">
                                     <div class="single_product_item">
                                         <img src="{{ asset('frontend/img/product/product_2.png') }}" alt="">
                                         <div class="single_product_text">
                                             <h4>Quartz Belt Watch</h4>
                                             <h3>$150.00</h3>
                                             <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-3 col-sm-6">
                                     <div class="single_product_item">
                                         <img src="{{ asset('frontend/img/product/product_3.png') }}" alt="">
                                         <div class="single_product_text">
                                             <h4>Quartz Belt Watch</h4>
                                             <h3>$150.00</h3>
                                             <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-3 col-sm-6">
                                     <div class="single_product_item">
                                         <img src="{{ asset('frontend/img/product/product_4.png') }}" alt="">
                                         <div class="single_product_text">
                                             <h4>Quartz Belt Watch</h4>
                                             <h3>$150.00</h3>
                                             <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-3 col-sm-6">
                                     <div class="single_product_item">
                                         <img src="{{ asset('frontend/img/product/product_5.png') }}" alt="">
                                         <div class="single_product_text">
                                             <h4>Quartz Belt Watch</h4>
                                             <h3>$150.00</h3>
                                             <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-3 col-sm-6">
                                     <div class="single_product_item">
                                         <img src="{{ asset('frontend/img/product/product_6.png') }}" alt="">
                                         <div class="single_product_text">
                                             <h4>Quartz Belt Watch</h4>
                                             <h3>$150.00</h3>
                                             <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-3 col-sm-6">
                                     <div class="single_product_item">
                                         <img src="{{ asset('frontend/img/product/product_7.png') }}" alt="">
                                         <div class="single_product_text">
                                             <h4>Quartz Belt Watch</h4>
                                             <h3>$150.00</h3>
                                             <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-3 col-sm-6">
                                     <div class="single_product_item">
                                         <img src="{{ asset('frontend/img/product/product_8.png') }}" alt="">
                                         <div class="single_product_text">
                                             <h4>Quartz Belt Watch</h4>
                                             <h3>$150.00</h3>
                                             <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div> --}}
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- product_list part start-->
     <!-- subscribe_area part start-->
     <section class="subscribe_area section_padding">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-lg-7">
                     <div class="subscribe_area_text text-center">
                         <h5>Join Our Newsletter</h5>
                         <h2>Subscribe to get Updated
                             with new offers</h2>
                         <div class="input-group">
                             <input type="text" class="form-control" placeholder="enter email address"
                                 aria-label="Recipient's username" aria-describedby="basic-addon2">
                             <div class="input-group-append">
                                 <a href="#" class="input-group-text btn_2" id="basic-addon2">subscribe now</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!--::subscribe_area part end::-->
 @endsection

 @push('JS')
     <script>
         $(document).ready(function() {
             $(".add_cart").click(function(e) {
                 e.preventDefault();
                 var id = $(this).data('product_id');

                 $.ajax({
                     type: "get",
                     url: "{{ route('add.to.cart') }}",
                     data: {
                         product_id: id
                     },
                     success: function(response) {
                         $(".cart_count").attr('value', response.count);
                     }
                 });
             })
         });
     </script>
 @endpush
