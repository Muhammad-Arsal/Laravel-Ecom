@extends('backend.layouts.main');
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <h2 class="text-center"><u>Insert Category</u></h2>
                <form method="post" action="{{ route('admin.add_category') }}">
                    @csrf
                    <div class="form-group">
                        <label for="">Insert Category</label>
                        <input id="" class="form-control" type="text" name="category">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
