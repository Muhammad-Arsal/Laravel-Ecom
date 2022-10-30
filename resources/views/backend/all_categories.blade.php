@extends('backend.layouts.main');
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container table-responsive py-5">
                <div class="float-right py-2">
                    <a href="{{ route('admin.add_category') }}" class="btn btn-primary">Add Category</a>
                </div>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Created On</th>
                            <th scope="col">Updated On</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($cat as $allcat)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $allcat['category_name'] }}</td>
                                <td>{{ $allcat['created_at'] }}</td>
                                <td>{{ $allcat['updated_at'] }}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
