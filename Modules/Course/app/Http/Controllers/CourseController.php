<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Course\Http\Requests\CourseRequest;
use Modules\Course\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Course::query();
        if (request('search')) {
            $search = request("search");
            $query->where("name", "LIKE", "%{$search}%");
        }

        $courses = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'collection' => view('course::partials._courses', compact("courses"))->render(),
                'pagination' => (string) $courses->appends(['search' => request('search')])->links(),
            ]);
        }

        return view('course::index', compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = Course::create([
            'name' => $request->name
        ]);

        return response()->json([
            'course' => view('course::partials._course', compact('course'))->render(),
            'message' => 'Course created successfully'
        ], 200);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('course::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return Course::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, $id)
    {

        $course = Course::findOrFail($id);
        $course->update([
            'name' => $request->name
        ]);

        return response()->json([
            'course' => $course,
            'message' => 'Course updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return response()->json([
            'message' => 'Course deleted successfully',
        ], 200);
    }
}
