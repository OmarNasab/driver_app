<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DriverController extends Controller
{


    public function __construct()
    {
        $this->middleware('role:add_driver', ['only' => ['create', 'store']]);
        $this->middleware('role:show_driver', ['only' => ['show']]);
        $this->middleware('role:edit_driver', ['only' => ['edit', 'update','changePassword','changeImage']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $drivers=Driver::all();
        return view("Pages.Driver.index",["drivers"=>$drivers]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("Pages.Driver.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function store(Request $request)
    {
        $request->validate([
            "full_name"=>["required","string"],
            "email"=>["email","required","string","unique:drivers"],
            "password"=>["required","confirmed",Rules\Password::defaults()],
            "image"=>["image"],
            "uaeID"=>["required","string"]
        ]);

       $path=$request["image"]->store("images");
        $driver=new Driver();
        $driver->full_name=$request->full_name;
        $driver->email=$request->email;
        $driver->password=Hash::make($request->password);
        $driver->image=$path;
        $driver->phone=$request->phone;;
        $driver->uaeID=$request->uaeID;
        $driver->status=0;
        $driver->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): View|Factory|Application
    {
        $driver=Driver::where("id",$id)->first();
        return view("./Pages/Driver/show",["driver"=>$driver]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $driver=Driver::where("id",$id)->first();
        return view("Pages.Driver.edit",["driver"=>$driver]);
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
        $data=[
            "full_name"=>$request->full_name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "uaeID"=>$request->uaeID,
        ];
        Driver::where("id",$id)->update($data);
        return redirect("driver/".$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
//        Driver::destroy($id);
        return back();
    }

    public function changePassword(Request $request,$id){
        $request->validate([
            "password"=>["required","confirmed",Rules\Password::defaults()],
        ]);
        Driver::where("id",$id)->update(["password"=>Hash::make($request->password)]);
        return back();
    }
    public function changeImage(Request $request,$id){
        $request->validate([
            "image"=>["image"],
        ]);
        $path=$request["image"]->store("images");
        Driver::where("id",$id)->update(["image"=>$path]);
        return back();
    }
}
