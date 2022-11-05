@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1 class="text-center"><u>Update Product</u></h1>
            <form action="{{ route('update.products', $p_id) }}" method="post">
                @csrf
                <div class="container">
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input id="" class="form-control" type="text" name="product_name"
                            value="{{ $productDetails->product_name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Product Image</label>
                        <div class="file-drop-area border border-primary border-2" style="background: rgb(209, 231, 231);">
                            <label for="files" class="d-block drop-area text-center rounded p-4">Click or Drop your Post
                                images here</label>
                            <input data-max-file-size="1" name="product_images[]" id="files" type="file" multiple>
                        </div>
                        @error('product_images')
                            <small class="text-danger" style="display: block;">
                                {{ $message }}
                            </small>
                        @enderror
                        <div class="card-columns" id="gallery_area"></div>
                    </div>
                    @php
                        $pics = \DB::table('product_images')
                            ->where('product_id', $productDetails->id)
                            ->get();
                    @endphp
                    <div class="row">
                        @forelse ($pics as $itemss)
                            <div class="col-3"><img src="{{ asset('frontend/prodImages') . '/' . $itemss->image_name }}"
                                    alt="" style="width: 100px; height:100px;">
                                <a href=""> <button type="submit" class="btn btn-danger">Delete</button></a>
                            </div>
                        @empty
                            <p>No Images Found</p>
                        @endforelse
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select id="" class="custom-select" name="category_id">
                            <option value="">Select Category</option>
                            @forelse ($allCat as $items)
                                <option @if ($items->id == $productDetails->category_id) {{ 'selected' }} @endif
                                    value="{{ $items->id }}">{{ $items->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Supplier</label>
                        <select id="" class="custom-select" name="supplier_id">
                            <option value="">Select Supplier</option>
                            @forelse ($suppliers as $item)
                                <option @if ($item->id == $productDetails->supplier_id) {{ 'selected' }} @endif
                                    value="{{ $item->id }}">
                                    {{ $item->supplier_name }}</option>
                            @empty
                            @endforelse

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Product Description</label>
                        <input id="" class="form-control" type="text" name="product_description"
                            value="{{ $productDetails->description }}">
                    </div>
                    <div class="form-group">
                        <label for="">Product Details</label>
                        <textarea id="details" class="form-control" name="product_detail" rows="3" name="details">{!! $productDetails->detail !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#details').summernote({
                placeholder: 'Product details',
                height: 100
            });
        });
    </script>
@endsection

@push('style')
    <style>
        .card-columns {
            display: grid;
            grid-template-columns: auto auto auto;
            grid-column-gap: 1px;
            grid-row-gap: 1px;
        }

        .file-drop-area {
            border: 1px solid #bfbbbb;
            border-radius: 4px;
            background: white;
        }

        .drop-area {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endpush
