@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <h1 class="text-center pt-2"><u>Supplier DashBoard</u></h1>
            </div>
            <form action="" method="post">
                <div class="container form-container mt-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Supplier</label>
                                <select id="" class="custom-select" name="supplier">
                                    <option value="">Choose Supplier</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Bill Number:</label>
                                <input id="" class="form-control" type="text" name="bill_no" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Supplier</label>
                                <select id="" class="custom-select" name="supplier">
                                    <option value="">Choose Supplier</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Cost Price</label>
                                <input id="" class="form-control" type="text" name="">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Pieces</label>
                                <input id="" class="form-control" type="text" name="">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Tax% on SP</label>
                                <input id="" class="form-control" type="text" name="">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Total</label>
                                <input id="" class="form-control" type="text" name="" readonly>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="my-input">Action</label>
                                <span><i style="display: block; font-size: 20px; color:green;"
                                        class="fas fa-plus add_button pt-2"></i></span>
                                <span> <i
                                        style="display: none; font-size: 20px; color:red;"class="fas fa-trash trash_button pt-2"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <h2 class="text-right">Sub Total</h2>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input id="" class="form-control" type="text" name="" readonly>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success float-right" name="submit">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
