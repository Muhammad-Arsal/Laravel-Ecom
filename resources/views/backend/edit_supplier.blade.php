@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1 class="text-center">Update Supplier</h1>
            <div class="container">
                @php
                    $name = \DB::table('supplier')
                        ->where('id', $supplier_id)
                        ->first();
                @endphp
                <form action="{{ route('update.supplier.page', $name->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Update Supplier Name</label>
                        <input id="" class="form-control" type="text" name="supplier_name"
                            value="{{ $name->supplier_name }}">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
