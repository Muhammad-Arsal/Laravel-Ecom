@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1 class="text-center"><u>Edit Product Category</u></h1>
            <form action="{{ route('update.product.categories', $id) }}" method="post">
                @csrf
                <div class="container">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input id="" class="form-control" type="text" name="category_name"
                            value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Parent Category</label>
                        <select class="custom-select" name="parent_id" id="">
                            <option value="">Select Parent Category</option>
                            @forelse ($allCat as $item)
                                <option @if ($item->id == $category->parent_id) {{ 'selected' }} @endif
                                    value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Upgrade</button>
                </div>
            </form>
        </div>
    </div>
@endsection
