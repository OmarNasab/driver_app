<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Expense;
use App\Models\Mission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    public function SignInRequest(Request $request)
    {
        $data=json_decode($request->getContent());
        $email=$data->email;
        $password=$data->password;
        $token=$data->token;
        $result=Driver::where("email",$email)->first();
        if($result){
            if(Hash::check($password,$result->password)){
                Driver::where("email",$email)->update(["device_id"=>$token]);
                return $result;
            }
            return response()->json();
        }
        return response()->json();
    }

    public function addExpense(Request $request)
    {
       $driver_id=$request->driver_id;
       $path=$request["attachment"]->store("documents");
       $expense=new Expense();
       $expense->driver_id=$driver_id;
       $expense->amount=$request->amount;
       $expense->category=$request->category;
       $expense->description=$request->description;
       $expense->attachment=$path;
       $expense->status=$expense::NOT_VERIFIED;
       $expense->save();
       return $expense;
    }
    public function getTotalExpensesForOneDriver(Request $request)
    {
        $data=json_decode($request->getContent());
        $totalExpenses=Expense::where("driver_id",$data->driver_id)->where("status",Expense::VALID)->sum("amount");
        if(!$totalExpenses){
            $totalExpenses=["amount"=>0];
        }
        return response()->json($totalExpenses);
    }

    public function getCurrentMission($id)
    {
        $mission=Mission::where("driver_id",$id)->where("status","0")->first();
        if($mission){
            return $mission;
        }
        return [];
    }

    public function finishDestination($id,Request $request){
        $data=json_decode($request->getContent(),true);
        $oldData=Mission::where("id",$id)->first();
        $Direction=$oldData->direction;
        array_push($Direction,$data);
        Mission::where("id",$id)->update(["direction"=>$Direction]);
    }

    public function finishTrip($id,Request $request){
        $data=json_decode($request->getContent(),true);
        $oldData=Mission::where("id",$id)->first();
        $Direction=$oldData->direction;
        array_push($Direction,$data);
        Mission::where("id",$id)->update(["direction"=>$Direction,"status"=>1,"completed_date"=>date("Y-m-d H:i:s")]);
        $oldData->driver->update(["status"=>0]);
    }
    public function totalTrips($id): JsonResponse
    {
        return response()->json(["totalTrips"=>count(Mission::where("driver_id",$id)->get())]);
    }
    public function getExpensesList($id){
        return Expense::where("driver_id",$id)->get();
    }
}
