<?php
namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::where('user_id', auth()->id())->get();
        return view('listIssues', compact('issues'));
    }
    public function adminIndex()
    {
        $issues = Issue::all(); // fetches all issues regardless of user
        return view('adminissues', compact('issues'));
    }

    public function create()
    {
        return view('issue');
    }

    public function store(Request $request)
    {
        $request->validate([
            'complainant_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'subcounty' => 'required|string',
            'ward' => 'nullable|string',
            'new_area' => 'nullable|string',
            'infrastructure_type' => 'required|string',
            'damage_description' => 'required|string',
            'severity_level' => 'required|string',
            'location_details' => 'required|string',
        ]);

        $issue = Issue::create(array_merge($request->only([
            'complainant_name',
            'phone_number',
            'subcounty',
            'ward',
            'new_area',
            'infrastructure_type',
            'damage_description',
            'severity_level',
            'location_details',
        ]), ['user_id' => auth()->id()]));

        return redirect('/')->with('success', true)->with('issue_id', $issue->id);
    }

    public function show($id)
{
    $issue = Issue::findOrFail($id); // throws 404 if not found
    return view('viewIssue', compact('issue'));
}
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Pending Review,In Progress,Resolved,Closed',
    ]);

    $issue = Issue::findOrFail($id);
    $issue->status = $request->status;
    $issue->save();

    return response()->json(['message' => 'Status updated successfully']);
}

}