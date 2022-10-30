@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1 class="text-center"><u>Add Products</u></h1>
            <div class="container">
                <div class="form-group">
                    <label for="">Text</label>
                    <input id="" class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select id="" class="custom-select" name="">
                        <option value="">Select Category</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Supplier</label>
                    <select id="" class="custom-select" name="">
                        <option value="">Select Supplier</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Product Description</label>
                    <input id="" class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                    <label for="">Product Details</label>
                    <textarea id="details" class="form-control" name="" rows="3" name="details"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
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
