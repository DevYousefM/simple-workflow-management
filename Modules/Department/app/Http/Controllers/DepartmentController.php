<?php

namespace Modules\Department\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Department\Http\Requests\DepartmentRequest;
use Modules\Department\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Department::query();
        if (request('search')) {
            $search = request("search");
            $query->where("name", "LIKE", "%{$search}%");
        }

        $departments = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'collection' => view('department::partials._departments', compact("departments"))->render(),
                'pagination' => (string) $departments->appends(['search' => request('search')])->links(),
            ]);
        }

        return view('department::index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $department = Department::create([
            'name' => $request->name
        ]);

        return response()->json([
            'department' => view('department::partials._department', compact('department'))->render(),
            'message' => 'Department created successfully'
        ], 200);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('department::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return Department::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->update([
            'name' => $request->name
        ]);

        return response()->json([
            'department' => $department,
            'message' => 'Department updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        if ($department->users()->count() > 0) {
            return response()->json([
                'message' => 'Department has users and cannot be deleted',
            ], 400);
        }
        $department->delete();

        return response()->json([
            'message' => 'Department deleted successfully',
        ], 200);
    }
}
