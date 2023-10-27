@extends('layouts.main')


@section('content')
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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h5 class="m-0 font-weight-bold text-primary mt-2">Edit Detail Asset</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.asset.update', $asset->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name Asset:</strong>
                            <input type="text" name="name" class="form-control" value="{{ $asset->name }}"
                                placeholder="Name Asset">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Warehouse:</strong>
                            <select class="form-control" name="warehouse_id" id="warehouse_id">
                                <option disabled selected>Select Warehouse</option>
                                @foreach ($warehouse as $data_warehouse)
                                    <option value="{{ $data_warehouse->id }}"
                                        @if ($data_warehouse->id == $asset->warehouse_id) selected
                                        @else @endif>
                                        {{ $data_warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Date:</strong>
                            <input type="date" name="date" value="{{ $asset->date }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description Asset:</strong>
                            <textarea class="form-control" style="height:100px" name="description" placeholder="Description Asset">{{ $asset->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <a class="btn btn-danger mr-2" href="{{ route('dashboard.asset.index') }}">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>






    {{-- <form action="{{ route('dashboard.warehouse.update', $warehouse->id) }}" method="POST">
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
    </form> --}}
@endsection
