@extends('backend.layouts.main');
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1 class="text-center pt-2"><u>Update Posts</u></h1>
            <div class="container">
                <form action="{{ route('admin.post.update', $post['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Post title</label>
                        <input id="" class="form-control" type="text" name="title" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="">Post Image</label>
                        <input id="" class="form-control" type="file" name="image" value="">
                    </div>
                    <div class="my-2"><img src="{{ asset('frontend/postImages') . '/' . $post->image }}" alt=""
                            style="width: 100px; height:100px">
                    </div>
                    <div class="form-group">
                        <label for="">Post Description</label>
                        <input id="" class="form-control" type="text" name="description"
                            value="{{ $post->description }}">
                    </div>
                    <div class="form-group">
                        <label for="">Post Category</label>
                        <select class="custom-select" name="category_id" id="">
                            <option selected>Select one</option>
                            @foreach ($allCategories as $all)
                                <option @if ($post->category_id == $all->id) {{ 'selected' }} @endif
                                    value="{{ $all->id }}">
                                    {{ $all->category_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Post details</label>
                        <textarea id="details" class="form-control" name="details" rows="3" name="details">{{ $post->post_details }}</textarea>
                    </div>
                    <button class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $("#details").summernote();
        });
    </script>
@endsection
