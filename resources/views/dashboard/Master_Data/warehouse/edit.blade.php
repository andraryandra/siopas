@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Warehouse</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard.warehouse.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.warehouse.update', $warehouse->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $warehouse->name }}"
                        placeholder="Name Warehouse">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:100px" name="description" placeholder="Description Warehouse">{{ $warehouse->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" style="height:100px" name="address" placeholder="Address Warehouse">{{ $warehouse->address }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
