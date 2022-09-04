<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = User::with('roles')->filter(Request::only('search', 'role'));
        if (Request::has('sort_by')) {
            $query = $query->orderBy(Request::input('sort_by'), Request::input('sort_dir', 'asc'));
        }
        return Inertia::render('Admins/Users/index', [
            'filters' => Request::all('search', 'role', 'per_page', 'sort_by', 'sort_dir'),
            'users' => $query->paginate(Request::input('per_page', 10))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admins/Users/create', [
            'roles' => Role::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Validator::make(Request::all(), [
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ])->validate('storeData');

        $user = User::create([
            'name' => Request::get('name'),
            'email' => Request::get('email'),
            'password' => Request::get('password'),
        ]);

        if (Request::get('roles')) {
            $user->syncRoles(Request::get('roles'));
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return Inertia::render('Admins/Users/edit', [
            'editData' => [
                'id'=> $user->id,
                'name'=> $user->name,
                'email'=> $user->email,
                'roles'=> $user->roles->pluck('name'),
            ],
            'roles' => Role::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        Validator::make(Request::all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable'],
        ])->validate('updateData');

        $user->update(Request::only('name', 'email'));

        if (Request::get('password')) {
            $user->update(['password' => Request::get('password')]);
        }

        if (Request::get('roles')) {
            $user->syncRoles(Request::get('roles'));
        }

        return Redirect::route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::route('admin.users.index');
    }
}
