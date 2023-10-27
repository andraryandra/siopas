@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard.role.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($role, ['method' => 'PUT', 'route' => ['dashboard.role.update', $role->id]]) !!}


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Menu Role</h5>
                    </div>
                    <hr>
                    <div class="form-group">
                        @foreach ($permission as $value)
                            @if (strpos($value->name, 'role-') === 0)
                                <div class="form-check my-2">
                                    <input type="checkbox" class="form-check-input" id="permission_{{ $value->id }}"
                                        name="permission[]" value="{{ $value->id }}"
                                        {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="permission_{{ $value->id }}">{{ $value->name }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Menu Role</h5>
                    </div>
                    <hr>
                    <div class="form-group">
                        @foreach ($permission as $value)
                            @if (strpos($value->name, 'product-') === 0)
                                <div class="form-check my-2">
                                    <input type="checkbox" class="form-check-input" id="permission_{{ $value->id }}"
                                        name="permission[]" value="{{ $value->id }}"
                                        {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="permission_{{ $value->id }}">{{ $value->name }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Menu Role</h5>
                    </div>
                    <hr>
                    <div class="form-group">
                        @foreach ($permission as $value)
                            @if (strpos($value->name, 'warehouse-') === 0)
                                <div class="form-check my-2">
                                    <input type="checkbox" class="form-check-input" id="permission_{{ $value->id }}"
                                        name="permission[]" value="{{ $value->id }}"
                                        {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="permission_{{ $value->id }}">{{ $value->name }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Menu Role</h5>
                    </div>
                    <hr>
                    <div class="form-group">
                        @foreach ($permission as $value)
                            @if (strpos($value->name, 'asset-') === 0)
                                <div class="form-check my-2">
                                    <input type="checkbox" class="form-check-input" id="permission_{{ $value->id }}"
                                        name="permission[]" value="{{ $value->id }}"
                                        {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="permission_{{ $value->id }}">{{ $value->name }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Menu Role</h5>
                    </div>
                    <hr>
                    <div class="form-group">
                        @foreach ($permission as $value)
                            @if (strpos($value->name, 'user-') === 0)
                                <div class="form-check my-2">
                                    <input type="checkbox" class="form-check-input" id="permission_{{ $value->id }}"
                                        name="permission[]" value="{{ $value->id }}"
                                        {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="permission_{{ $value->id }}">{{ $value->name }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Menu Role</h5>
                    </div>
                    <hr>
                    <div class="form-group">
                        @foreach ($permission as $value)
                            @if (strpos($value->name, 'peminjaman-') === 0)
                                <div class="form-check my-2">
                                    <input type="checkbox" class="form-check-input" id="permission_{{ $value->id }}"
                                        name="permission[]" value="{{ $value->id }}"
                                        {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="permission_{{ $value->id }}">{{ $value->name }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    {!! Form::close() !!}


@endsection
