@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1 class="text-center"><u>Add Supplier</u></h1>
            <div class="container">
                <form action="{{ route('store.supplier') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Supplier Name</label>
                        <input id="" class="form-control" type="text" name="supplier_name">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
