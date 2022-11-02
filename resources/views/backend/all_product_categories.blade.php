@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Parent Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($allProductCategories as $item)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if ($item->parent_id == 0)
                                                {{ 'No Parent' }}
                                            @else
                                                @php
                                                    $catName = \DB::table('products_category')
                                                        ->where('id', $item->parent_id)
                                                        ->first();
                                                @endphp
                                                {{ $catName->name }}
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('edit.product.categories', $item->id) }}"><button
                                                    type="button" class="btn btn-success"><i
                                                        class="fas fa-edit"></i></button></a>
                                            <a href="{{ route('delete.product.category', $item->id) }}"> <button
                                                    type="button" class="btn btn-danger"><i
                                                        class="far fa-trash-alt"></i></button></a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
