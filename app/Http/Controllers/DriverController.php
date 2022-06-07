<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DriverController extends Controller
{
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
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
        //
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
