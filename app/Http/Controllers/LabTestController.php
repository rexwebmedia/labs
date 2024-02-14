<?php

namespace App\Http\Controllers;

use App\Models\LabTest;
use Illuminate\Http\Request;
use Exception;
use App\Models\LabTestCategory;

class LabTestController extends Controller
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
        $items = LabTest::where('team_id', $team_id)->with('category:id,name')->paginate(10)->withQueryString();
        return view('lab-tests.index', ['items' => $items]);
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
            $item = LabTest::create([
                'name' => 'New lab test',
                'team_id' => $req->user()->currentTeam->id,
            ]);
            return response()->json([
                'success' => true,
                'redirect' => route('lab-tests.edit', $item),
                'message' => 'Lab Test created',
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
    public function show(LabTest $labTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req, LabTest $labTest)
    {
        $team_id = $req->user()->currentTeam->id;
        $categories = LabTestCategory::where('team_id', $team_id)
                        ->where('status', 'published')
                        ->get(['id', 'name']);
        return view('lab-tests.edit', [
            'item' => $labTest,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, LabTest $labTest)
    {
        $item = $labTest;
        $validated = $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['nullable',],
            'category' => ['nullable'],
            'status' => ['nullable', 'in:draft,published'],
        ]);

        $validated['lab_test_category_id'] = $validated['category'] ?? null;

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
    public function destroy(LabTest $labTest)
    {
        //
    }
}
