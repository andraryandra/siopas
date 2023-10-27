@extends('layouts.main')


@section('content')
    @include('layouts.alert')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h5 class="m-0 font-weight-bold text-primary mt-2">Role Management</h5>
                </div>
                <div class="col-6 text-right">
                    @can('product-create')
                        <a href="{{ route('dashboard.role.create') }}" class="btn btn-success btn-icon-split">
                            <span class="text">Create New Role</span>
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
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td class="text-center">{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td class="text-center">
                                    <a class="btn btn-info" href="{{ route('dashboard.role.show', $role->id) }}">Show</a>
                                    @can('role-edit')
                                        <a class="btn btn-primary" href="{{ route('dashboard.role.edit', $role->id) }}">Edit</a>
                                    @endcan
                                    @can('role-delete')
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['dashboard.role.destroy', $role->id],
                                            'style' => 'display:inline',
                                        ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {!! $roles->render() !!}
@endsection
