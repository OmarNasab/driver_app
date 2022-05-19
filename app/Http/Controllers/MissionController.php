<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Mission;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $in_progress=Mission::where("status",Mission::IN_PROGRESS)->get();
        $completed=Mission::where("status",Mission::COMPLETED)->get();

        return View("Pages.Mission.index",["in_progress"=>$in_progress,"completed"=>$completed]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $drivers=Driver::where("status","0")->get();
        return view("Pages.Mission.create",["drivers"=>$drivers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function ajax_store(Request $request){
        $data=json_decode($request->getContent());


        $driver_id=$data->driver_id;
        $supervisor=$data->supervisor;
        $description=$data->description;
        $places=$data->places;
        $mission=new Mission();
        $mission->user_id=$supervisor;
        $mission->driver_id=$driver_id;
        $mission->description=$description;
        $mission["stops"]=$places;
        $mission["direction"]="[]";
        $mission->status=0;
        $mission->save();

        Driver::where("id",$driver_id)->update(["status"=>"1"]);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
