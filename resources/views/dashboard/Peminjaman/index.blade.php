@extends('layouts.main')


@section('content')
    @include('layouts.alert')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h5 class="m-0 font-weight-bold text-primary mt-2">Borrowing</h5>
                </div>
                <div class="col-6 text-right">
                    @can('product-create')
                        <a href="{{ route('dashboard.peminjaman.create') }}" class="btn btn-success btn-icon-split">
                            <span class="text">Create New Borrowing</span>
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
                            <th>No.Seri</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Gudang</th>
                            <th>Tanggal</th>
                            <th>Jumlah QR Print</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($asset as $data_asset)
                            <tr>
                                <td>{{ $data_asset->seri }}</td>
                                <td>{{ $data_asset->name }}</td>
                                <td>{{ $data_asset->description }}</td>
                                <td>{{ $data_asset->warehouse->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($data_asset->date)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    {!! QrCode::size(80)->generate(route('dashboard.asset.show', $data_asset->id)) !!}
                                </td>
                                <td class="text-center">
                                    @can('asset-list')
                                        <a class="btn btn-info"
                                            href="{{ route('dashboard.asset.show', $data_asset->id) }}">Show</a>
                                    @endcan
                                    @can('asset-edit')
                                        <a class="btn btn-primary"
                                            href="{{ route('dashboard.asset.edit', $data_asset->id) }}">Edit</a>
                                    @endcan
                                    @can('asset-delete')
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['dashboard.asset.destroy', $data_asset->id],
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
                        @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {!! $peminjaman->links() !!}
@endsection
