@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1 class="text-center"><u>Add Product Category</u></h1>
            <form action="{{ route('store.product.categories') }}" method="post">
                @csrf
                <div class="container">
                    <div class="form-group">
                        <label for="">Product Category</label>
                        <input id="" class="form-control" type="text" name="category_name">
                    </div>
                    <div class="form-group">
                        <label for="">Parent Category</label>
                        <select class="custom-select" name="parent_id" id="">
                            <option value="">Select Parent Category</option>
                            @forelse ($allCat as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @empty
                            @endforelse

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
