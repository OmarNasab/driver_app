<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $roles=Role::all();
        return view("Pages.Role.index",["roles"=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $permissions=new Role();
        return view("Pages.Role.create",["permissions"=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>["required","string"],
        ]);
        $role=new Role();
        $role->name=$request->name;
        $role->permissions=$role->setPermissions($request->permissions);
        $role->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $permissions=new Role();
        $role=Role::where("id",$id)->first();
        return view("Pages.Role.edit",["permissions"=>$permissions,"role"=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Role::query()->where("id",$id)->update(["permissions"=> (new Role)->setPermissions($request->permissions)]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
