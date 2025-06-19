<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;

class ReportController extends Controller
{
    // For regular users – fetch only their own issues
    public function index(Request $request)
    {
        $start = $request->input('start_date', now()->subDays(30)->toDateString());
        $end = $request->input('end_date', now()->toDateString());

        $issues = Issue::where('user_id', auth()->id())
                    ->whereBetween('created_at', [$start, $end])
                    ->get();

        $summary = [
            'total' => $issues->count(),
            'by_type' => $issues->groupBy('infrastructure_type')->map->count(),
            'by_status' => $issues->groupBy('status')->map->count(),
        ];

        return view('report', compact('issues', 'summary', 'start', 'end'));
    }

    // For admins – fetch all issues
    public function adminIndex(Request $request)
    {
        $start = $request->input('start_date', now()->subDays(30)->toDateString());
        $end = $request->input('end_date', now()->toDateString());

        $issues = Issue::whereBetween('created_at', [$start, $end])->get();

        $summary = [
            'total' => $issues->count(),
            'by_type' => $issues->groupBy('infrastructure_type')->map->count(),
            'by_status' => $issues->groupBy('status')->map->count(),
        ];

        return view('admin-report', compact('issues', 'summary', 'start', 'end'));
    }
}

