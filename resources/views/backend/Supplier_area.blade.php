@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1 class="text-center"><u>Choose Service</u></h1>
            <div class="col-12 mx-auto pt-5">
                <div class="row">
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('add.supplier') }}" class="card-text h4"><img class="card-img-top"
                                    src="{{ asset('backend/demoimages/user_add.png') }}" alt="Card image cap"></a>
                            <div class="card-body text-center">
                                <a class="card-text h4" href="{{ route('add.supplier') }}">Add Supplier</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('all.supplier') }}" class="card-text h4"><img class="card-img-top"
                                    src="{{ asset('backend/demoimages/4866608.png') }}" alt="Card image cap"></a>
                            <div class="card-body text-center">
                                <a class="card-text h4" href="{{ route('all.supplier') }}">View Suppliers</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('supplier.dash') }}" class="card-text h4"><img class="card-img-top"
                                    src="{{ asset('backend/demoimages/1561391-200.png') }}" alt="Card image cap"></a>
                            <div class="card-body text-center">
                                <a class="card-text h4" href="{{ route('supplier.dash') }}">Supplier Dashboard</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('defective.pieces') }}" class="card-text text-center h4"><img
                                    class="card-img-top"
                                    src="{{ asset('backend/demoimages/istockphoto-1331894784-612x612.jpg') }}"
                                    alt="Card image cap"></a>
                            <div class="card-body text-center">
                                <a class="card-text h4" href="{{ route('defective.pieces') }}">Defective Pieces</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
