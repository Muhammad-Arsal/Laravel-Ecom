@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1 class="text-center"><u>Select Service</u></h1>
            <div class="col-12 mx-auto pt-5">
                <div class="row">
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('admin.all.product') }}" class="card-text h4"><img class="card-img-top"
                                    src="{{ asset('backend/demoimages/all products.png') }}" alt="Card image cap"></a>
                            <div class="card-body text-center">
                                <a class="card-text h4" href="{{ route('admin.all.product') }}">All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('admin.add.product') }}" class="card-text h4"><img class="card-img-top"
                                    src="{{ asset('backend/demoimages/Add product.png') }}" alt="Card image cap"></a>
                            <div class="card-body text-center">
                                <a class="card-text h4" href="{{ route('admin.add.product') }}">Add Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('all.product.categories') }}" class="card-text h4"><img class="card-img-top"
                                    src="{{ asset('backend/demoimages/home-category.png') }}" alt="Card image cap"></a>
                            <div class="card-body text-center">
                                <a class="card-text h4" href="{{ route('all.product.categories') }}">All Categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('add.product.categories') }}" class="card-text text-center h4"><img
                                    class="card-img-top" src="{{ asset('backend/demoimages/add category.png') }}"
                                    alt="Card image cap"></a>
                            <div class="card-body text-center">
                                <a class="card-text h4" href="{{ route('add.product.categories') }}">Add Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
