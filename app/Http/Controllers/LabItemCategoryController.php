<?php

namespace App\Http\Controllers;

use App\Models\LabItemCategory;
use Illuminate\Http\Request;
use Exception;

class LabItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = LabItemCategory::withCount('labItems')
                    ->paginate(10)->withQueryString();
        return view('lab-item-categories.index', ['items' => $items]);
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
            $item = LabItemCategory::create([
                'name' => 'New lab item cateogry',
                'team_id' => $req->user()->currentTeam->id,
            ]);
            return response()->json([
                'success' => true,
                'redirect' => route('lab-item-categories.edit', $item),
                'message' => 'Lab item category created',
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
    public function show(LabItemCategory $labItemCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LabItemCategory $labItemCategory)
    {
        return view('lab-item-categories.edit', [
            'item' => $labItemCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, LabItemCategory $labItemCategory)
    {
        $item = $labItemCategory;
        $validated = $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['nullable', 'in:draft,published'],
        ]);

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
    public function destroy(LabItemCategory $labItemCategory)
    {
        //
    }
}
