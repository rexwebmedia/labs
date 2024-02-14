<?php

namespace App\Http\Controllers;

use App\Models\LabTestCategory;
use Illuminate\Http\Request;
use Exception;

class LabTestCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = LabTestCategory::withCount('labTests')->paginate(10)->withQueryString();
        return view('lab-test-categories.index', ['items' => $items]);
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
            $item = LabTestCategory::create([
                'name' => 'New lab test',
                'team_id' => $req->user()->currentTeam->id,
            ]);
            return response()->json([
                'success' => true,
                'redirect' => route('lab-test-categories.edit', $item),
                'message' => 'Lab Test Category created',
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
    public function show(LabTestCategory $labTestCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LabTestCategory $labTestCategory)
    {
        return view('lab-test-categories.edit', [
            'item' => $labTestCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, LabTestCategory $labTestCategory)
    {
        $item = $labTestCategory;
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
    public function destroy(LabTestCategory $labTestCategory)
    {
        //
    }
}
