<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('role:add_user', ['only' => ['create', 'store']]);
        $this->middleware('role:edit_user', ['only' => ['edit', 'update','changePassword','changeImage']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $user=User::all();
        return view("Pages.User.index",["users"=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles=Role::all();
        return view("Pages.User.create",["roles"=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function store(Request $request): Application|Factory|View
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "role_id"=>["required","string"],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

       User::create([
            'name' => $request->name,
            'email' => $request->email,
            "role_id"=> $request->role_id,
            'password' => Hash::make($request->password),
        ]);
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
        $roles=Role::all();
        $user=User::where("id",$id)->first();
        return view("Pages.User.edit",["user"=>$user,"roles"=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            "role_id"=>["required","string"],
        ]);

        $data=[
            'name' => $request->name,
            'email' => $request->email,
            "role_id"=> $request->role_id,
        ];
        User::where("id",$id)->update($data);
        return back();
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
    public function changePassword(Request $request,$id){
        $request->validate([
            "password"=>["required","confirmed",Rules\Password::defaults()],
        ]);
        User::where("id",$id)->update(["password"=>Hash::make($request->password)]);
        return $this->index();
    }
    public function editPassword($id){
        $user=User::query()->where("id",$id)->first();
        return \view("Pages.User.edit-password",["user"=>$user]);
    }
}
