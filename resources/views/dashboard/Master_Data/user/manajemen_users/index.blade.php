@extends('layouts.main')
@section('content')
    @include('layouts.alert')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h5 class="m-0 font-weight-bold text-primary mt-2">Users Management</h5>
                </div>
                <div class="col-6 text-right">

                    <a href="{{ route('dashboard.user.create') }}" class="btn btn-success btn-icon-split">
                        <span class="text">Create new user</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tablebarang" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" width="50px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $user)
                            <tr>
                                <td class="text-center" width="50px">{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="text-center">
                                    @can('user-list')
                                        <a class="btn btn-info" href="{{ route('dashboard.user.show', $user->id) }}">Show</a>
                                    @endcan
                                    @can('user-edit')
                                        <a class="btn btn-primary" href="{{ route('dashboard.user.edit', $user->id) }}">Edit</a>
                                    @endcan
                                    @can('user-delete')
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['dashboard.user.destroy', $user->id],
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
    {!! $data->render() !!}
@endsection
