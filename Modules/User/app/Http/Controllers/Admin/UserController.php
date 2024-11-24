<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Department\Models\Department;
use Modules\User\Http\Requests\UserCreateRequest;
use Modules\User\Http\Requests\UserEditRequest;
use Modules\User\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();
        if (request('search')) {
            $search = request("search");
            $query->where("name", "LIKE", "%{$search}%")->where("email", "LIKE", "%{$search}%")->orWhereHas('department', function ($query) use ($search) {
                    $query->where("name", "LIKE", "%{$search}%");
                });
        }

        $users = $query->with(['department'])->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'collection' => view('user::partials._users', compact("users"))->render(),
                'pagination' => (string) $users->appends(['search' => request('search')])->links(),
            ]);
        }

        $departments = Department::all();
        return view('user::index', compact('departments', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'department_id' => $data['department_id'],
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => view('user::partials._user', compact('user'))->render(),
        ]);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return User::with(['department'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validated();
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user->load('department'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ], 200);
    }
}
