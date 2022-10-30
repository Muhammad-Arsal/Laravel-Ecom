@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container pt-5">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Supplier Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $supplier = \DB::table('supplier')->get();
                                    $i = 1;
                                @endphp
                                @forelse ($supplier as $item)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $item->supplier_name }}</td>
                                        <td>
                                            <a href="{{ route('edit.supplier.page', $item->id) }}"><button type="button"
                                                    class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                                            <a href="{{ route('delete.supplier', $item->id) }}"><button type="button"
                                                    class="btn btn-danger"><i class="far fa-trash-alt"></i></button></a>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No record Found</p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
