<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Mission;
use App\Models\Vehicle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:add_mission', ['only' => ['create', 'ajax_store']]);
        $this->middleware('role:show_mission', ['only' => ['show']]);
    }

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
        $vehicles=Vehicle::where("status","0")->get();
        $drivers=Driver::where("status","0")->get();
        return view("Pages.Mission.create",["drivers"=>$drivers,"vehicles"=>$vehicles]);
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
        $vehicle_id=$data->vehicle_id;
        $supervisor=$data->supervisor;
        $description=$data->description;
        $places=$data->places;
        $mission=new Mission();
        $mission->user_id=$supervisor;
        $mission->driver_id=$driver_id;
        $mission->vehicle_id=$vehicle_id;
        $mission->description=$description;
        $mission->invoices=$data->invoices;
        $mission->type=$data->type;
        $mission["stops"]=$places;
        $mission["direction"]=[];
        $mission->status=0;
        $mission->save();

        Driver::where("id",$driver_id)->update(["status"=>"1"]);


        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = Driver::where("id",$driver_id)->first();

        $serverKey = 'AAAAap2-sag:APA91bFvbM-WY2eJQ6r8d4Bg-LVAKXI5wwGjY7kXKicC-Idh_Bk-4sgwNKgzVLDIqZZxp_3TmK6S40t8_p7en9wgllyvg8yxp78FjVT2MquWQTdhdlHZVquNwC42RupBBSNB-YNuZu0_';

        $data = [
            "to" => $FcmToken->device_id,
            "notification" => [
                "title" => "New Mission",
                "body" => "You have a new Mission",
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $mission=Mission::where("id",$id)->first();
        return view("Pages.Mission.show",["mission"=>$mission]);
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
