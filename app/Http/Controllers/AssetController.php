<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Warehouse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class AssetController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:asset-list|asset-create|asset-edit|asset-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:asset-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:asset-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:asset-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        if (Gate::denies('asset-list')) {
            abort(403);
        }

        $data = [
            'asset' => Asset::latest()->paginate(10),
            'warehouse' => Warehouse::all(),
        ];
        return view('dashboard.Master_Data.asset.index', $data)
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        if (Gate::denies('asset-list')) {
            abort(403);
        }
        $data = [
            'warehouse' => Warehouse::all(),
        ];
        return view('dashboard.Master_Data.asset.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('asset-list')) {
            abort(403);
        }
        $latestAsset = Asset::latest()->first();
        $currentYear = date("Y-m-d");
        if ($latestAsset == null) {
            $nomorUrut = 1;
        } else {
            $lastCode = substr($latestAsset->seri, 7);
            $nomorUrut = intval($lastCode) + 1;
        }
        $seri = 'AST' . $currentYear . '-' . str_pad($nomorUrut, STR_PAD_LEFT);
        $request->validate([
            'name' => 'required|string|max:255',
            'warehouse_id' => 'required|integer',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'qr_count' => 'nullable'
        ]);
        try {
            $currentUser = Auth::user();
            $validatedData = $request->except('_token');
            $validatedData['seri'] = $seri;
            $validatedData['created_by'] = $currentUser->fullname;
            $validatedData['updated_by'] = $currentUser->fullname;
            Asset::create($validatedData);
            return redirect()->route('dashboard.asset.index')
                ->with('success', 'Asset created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Asset created failed.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        if (Gate::denies('asset-list')) {
            abort(403);
        }
        $data = [
            'asset' => Asset::find($id),
            'warehouse' => Warehouse::all(),
        ];
        return view('dashboard.Master_Data.asset.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        if (Gate::denies('asset-list')) {
            abort(403);
        }
        $data = [
            'asset' => Asset::find($id),
            'warehouse' => Warehouse::all(),
        ];
        return view('dashboard.Master_Data.asset.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('asset-list')) {
            abort(403);
        }
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', // Gunakan nullable agar deskripsi bisa kosong.
            'date' => 'required|date',
            'warehouse_id' => 'required|integer',
        ]);
        // dd($request);

        try {
            $asset = Asset::findOrFail($id);
            $asset->update([
                'name' => $request->name,
                'description' => $request->description,
                'date' => $request->date,
                'warehouse_id' => $request->warehouse_id,
            ]);

            return redirect()->route('dashboard.asset.index')
                ->with('success', 'Asset updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Asset updated failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        if (Gate::denies('asset-list')) {
            abort(403);
        }
        Asset::find($id)->delete();
        return redirect()->route('dashboard.asset.index')
            ->with('success', 'Asset deleted successfully');
    }
}
