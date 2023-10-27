<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:warehouse-list|warehouse-create|warehouse-edit|warehouse-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:warehouse-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:warehouse-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:warehouse-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $warehouse = Warehouse::latest()->paginate(10);
        return view('dashboard.Master_Data.warehouse.index', compact('warehouse'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('dashboard.Master_Data.warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        // dd('oke');
        request()->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
            'address' => 'required|string',
        ]);

        Warehouse::create($request->all());

        return redirect()->route('dashboard.warehouse.index')
            ->with('success', 'Warehouse created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $warehouse = Warehouse::find($id);
        return view('dashboard.Master_Data.warehouse.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $warehouse = Warehouse::find($id);
        return view('dashboard.Master_Data.warehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', // Gunakan nullable agar deskripsi bisa kosong.
            'address' => 'required|string',
        ]);
        // dd($request);

        try {
            $warehouse = Warehouse::findOrFail($id);
            $warehouse->update([
                'name' => $request->name,
                'description' => $request->description,
                'address' => $request->address,
            ]);

            return redirect()->route('dashboard.warehouse.index')
                ->with('success', 'Warehouse updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Warehouse updated failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warehouse  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        Warehouse::find($id)->delete();
        return redirect()->route('dashboard.warehouse.index')
            ->with('success', 'Usewarehouse deleted successfully');
    }
}
