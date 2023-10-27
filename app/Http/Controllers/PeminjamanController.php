<?php

namespace App\Http\Controllers;

use App\Models\Asset_status;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:peminjaman-list|peminjaman-create|peminjaman-edit|peminjaman-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:peminjaman-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:peminjaman-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:peminjaman-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $data = [
            'peminjaman' => Asset_status::latest()->paginate(10),
        ];
        return view('dashboard.Peminjaman.index', $data)
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('dashboard.Peminjaman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Asset_status::create($request->all());

        return redirect()->route('dashboard.peminjaman.index')
            ->with('success', 'Peminjaman created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset_status  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        return view('dashboard.Peminjaman.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset_status  $asset_status
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        return view('dashboard.Peminjaman.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset_status  $asset_status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset_status $asset_status): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $asset_status->update($request->all());

        return redirect()->route('dashboard.peminjaman.index')
            ->with('success', 'Peminjaman updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset_status  $asset_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset_status $asset_status): RedirectResponse
    {
        $asset_status->delete();

        return redirect()->route('dashboard.peminjaman.index')
            ->with('success', 'Peminjaman deleted successfully');
    }
}
