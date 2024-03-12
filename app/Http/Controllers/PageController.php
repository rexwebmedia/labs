<?php

namespace App\Http\Controllers;

use App\Models\LabItem;
use App\Models\LabTest;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $req)
    {
        return view('pages.index');
    }

    public function dashboard(Request $req)
    {
        $currentUser = $req->user();
        $labItemsCount = LabItem::where('team_id', $currentUser->currentTeam->id)->count();
        $labTestsCount = LabTest::where('team_id', $currentUser->currentTeam->id)->count();
        return view('dashboard', [
            'labItemsCount' => $labItemsCount,
            'labTestsCount' => $labTestsCount,
        ]);
    }
}
