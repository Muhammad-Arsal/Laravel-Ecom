@extends('backend.layouts.main');

@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1 class="text-center pt-2"><u>Insert Posts</u></h1>
            <div class="container">
                <form action="{{ route('admin.add_post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Post Title</label>
                        <input id="" class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label for="">Upload Photo</label>
                        <input id="" class="form-control" type="file" name="picture">
                    </div>
                    <div class="form-group">
                        <label for="">Select Category</label>
                        <select class="custom-select" name="category" id="">
                            <option selected>Select one</option>
                            @foreach ($allCategories as $catData)
                                <option value="{{ $catData['id'] }}">{{ $catData['category_name'] }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Short Description</label>
                        <input id="" class="form-control" type="text" name="description">
                    </div>
                    <div class="form-group">
                        <label for="">Details</label>
                        <textarea id="details" class="form-control details" name="details" rows="3" id="details"></textarea>
                    </div>
                    <button class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('#details').summernote({
                placeholder: 'Blog details',
                height: 100
            });
        });
    </script>
@endsection
