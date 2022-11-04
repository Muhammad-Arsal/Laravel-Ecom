@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container py-2">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('admin.add.product') }}"><button class="btn btn-primary text-right float-right">Add
                                Products</button></a>
                    </div>
                </div>

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Products Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Cost Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($products as $item)
                                    @php
                                        $productImages = \DB::table('product_images')
                                            ->where('product_id', $item->id)
                                            ->first();
                                        
                                        $catName = \DB::table('products_category')
                                            ->where('id', $item->category_id)
                                            ->first();
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td><img src="{{ asset('frontend/prodImages' . '/' . $productImages->image_name) }}"
                                                alt="" style="width: 150px; height: 100px;"></td>
                                        <td>{{ $item->product_name }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $catName->name }}</td>
                                        <td>
                                            <a href="{{ route('edit.products', $item->id) }}"><button type="button"
                                                    class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                                            <button type="button" class="btn btn-danger"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
