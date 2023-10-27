@extends('layouts.main')


@section('content')
    @include('layouts.alert')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h5 class="m-0 font-weight-bold text-primary mt-2">Warehouse Management</h5>
                </div>
                <div class="col-6 text-right">
                    @can('product-create')
                        <a href="{{ route('dashboard.warehouse.create') }}" class="btn btn-success btn-icon-split">
                            <span class="text">Create New Warehouse</span>
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tablebarang" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no_warehouse = 1;
                        @endphp
                        @forelse ($warehouse as $data_warehouse)
                            <tr>
                                <td class="text-center">{{ $no_warehouse++ }}</td>
                                <td>{{ $data_warehouse->name }}</td>
                                <td>{{ $data_warehouse->description }}</td>
                                <td>{{ $data_warehouse->address }}</td>
                                <td class="text-center">
                                    @can('warehouse-list')
                                        <a class="btn btn-info"
                                            href="{{ route('dashboard.warehouse.show', $data_warehouse->id) }}">Show</a>
                                    @endcan
                                    @can('warehouse-edit')
                                        <a class="btn btn-primary"
                                            href="{{ route('dashboard.warehouse.edit', $data_warehouse->id) }}">Edit</a>
                                    @endcan
                                    @can('warehouse-delete')
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['dashboard.warehouse.destroy', $data_warehouse->id],
                                            'style' => 'display:inline',
                                        ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {!! $warehouse->links() !!}
@endsection
