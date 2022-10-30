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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bootstrap </td>
                                    <td>Cristina</td>
                                    <td>2.846</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger"><i
                                                class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
