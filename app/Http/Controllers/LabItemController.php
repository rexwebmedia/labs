<?php

namespace App\Http\Controllers;

use App\Models\LabItem;
use App\Models\LabItemCategory;
use Exception;
use Illuminate\Http\Request;

class LabItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only([
            'index', 'store', 'update', 'edit', 'create'
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $team_id = $req->user()->currentTeam->id;
        $items = LabItem::where('team_id', $team_id)
                    ->with('category:id,name')
                    ->paginate(10)->withQueryString();
        return view('lab-items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        try {
            // $nanoidClient = new Client();
            // $nanoid = $nanoidClient->generateId();
            $item = LabItem::create([
                'name' => 'New lab item',
                'team_id' => $req->user()->currentTeam->id,
            ]);
            return response()->json([
                'success' => true,
                'redirect' => route('lab-items.edit', $item),
                'message' => 'Lab Item created',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LabItem $labItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req, LabItem $labItem)
    {
        $team_id = $req->user()->currentTeam->id;
        $categories = LabItemCategory::where('team_id', $team_id)
                        ->where('status', 'published')
                        ->get(['id', 'name']);
        return view('lab-items.edit', [
            'item' => $labItem,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, LabItem $labItem)
    {
        $item = $labItem;
        $validated = $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['nullable',],
            'category' => ['nullable'],
            'status' => ['nullable', 'in:draft,published'],
        ]);

        $validated['lab_item_category_id'] = $validated['category'] ?? null;

        try {
            $item->update($validated);
        } catch (Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'success' => true, 'message' => 'Saved successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LabItem $labItem)
    {
        //
    }
}
