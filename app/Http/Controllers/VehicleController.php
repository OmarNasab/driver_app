<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $vehicles=Vehicle::all();
        return view("Pages.Vehicle.index",["vehicles"=>$vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("Pages.Vehicle.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function store(Request $request): View|Factory|Application
    {

        $front_side=$request["license_front_side"]->store("vehicle/front_side");
        $back_side=$request["license_back_side"]->store("vehicle/back_side");

        $data=[
            "traffic_plate_number"=>$request->traffic_plate_number,
            "type"=>$request->type,
            "model"=>$request->model,
            "place_of_issue"=>$request->place_of_issue,
            "registration_date"=>$request->registration_date,
            "expiration_date"=>$request->expiration_date,
            "insurance_expiration_date"=>$request->insurance_expiration_date,
            "license_front_side"=>$front_side,
            "license_back_side"=>$back_side
        ];

        Vehicle::create($data);
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
        $vehicle=Vehicle::where("id",$id)->first();
        return view("Pages.Vehicle.show",["vehicle"=>$vehicle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $vehicle=Vehicle::where("id",$id)->first();
        return view("Pages.Vehicle.edit",["vehicle"=>$vehicle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $data=[
            "traffic_plate_number"=>$request->traffic_plate_number,
            "type"=>$request->type,
            "model"=>$request->model,
            "place_of_issue"=>$request->place_of_issue,
            "registration_date"=>$request->registration_date,
            "expiration_date"=>$request->expiration_date,
            "insurance_expiration_date"=>$request->insurance_expiration_date
        ];

        Vehicle::where("id",$id)->update($data);
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
        
    }
}
