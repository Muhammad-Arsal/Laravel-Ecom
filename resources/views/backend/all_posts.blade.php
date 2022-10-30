@extends('backend.layouts.main');
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container table-responsive py-5">
                <div class="float-right py-2">
                    <a href="{{ route('admin.add_post') }}" class="btn btn-primary">Add Post</a>
                </div>
                <table class="table table-bordered table-hover" style=" white-space: nowrap;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Post Image</th>
                            <th scope="col">Post Title</th>
                            <th class="col">Post Description</th>
                            <th class="col">Post Category</th>
                            <th scope="col">Created On</th>
                            <th scope="col">Updated On</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($allPosts as $allpos)
                            @php
                                $catName = \DB::table('category')
                                    ->where('id', $allpos['category_id'])
                                    ->first();
                            @endphp
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td><img src="{{ asset('frontend/postImages') . '/' . $allpos['image'] }}" alt=""
                                        style="height: 100px;
                                        width: 100px;">
                                </td>
                                <td>{{ $allpos['title'] }}</td>
                                <td>{{ substr($allpos['description'], 0, 10) . '......' }}</td>
                                <td>{{ $catName->category_name }}</td>
                                <td>{{ $allpos['created_at'] }}</td>
                                <td>{{ $allpos['updated_at'] }}</td>
                                <td>
                                    <a href="{{ route('admin.post.edit', $allpos['id']) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    <a href="{{ route('delete.post', $allpos['id']) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
