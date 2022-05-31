<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'id');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {


        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::create($request->validated());

        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        // se è stata validata l'agenzia, salvo la relazione
        if($request->input('agenzia') && $request->input('roles') == 'agenzia'){

            $user->agenzia()->save(Agenzia::find($request->input('agenzia')));
        }

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $roles = Role::get()->pluck('name', 'id');

        $agenzie = Cache::remember('agenzie', 2000, function(){
            return Agenzia::pluck('name','id');
        });

        return view('admin.users.edit', compact('user', 'roles','agenzie'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        // checkbox nel form edit
        if($request->has('forza_cambio_password')){
            $user->first_login = NULL;
        }

        $user->update($request->validated());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        // se è stata validata l'agenzia, salvo la relazione
        if($request->input('agenzia') && $request->input('roles') == 'agenzia'){

            $user->agenzia()->sync([$request->input('agenzia')]);
        }

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

    public function show_form_firma()
    {
        if(!Auth::check()){
            return abort(401);
        }

        if (! Gate::allows('set_firma')) {
            return abort(401);
        }

        return view('admin.users.signature_form');
    }




}
