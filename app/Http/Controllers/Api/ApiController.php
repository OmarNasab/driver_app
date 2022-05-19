<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Expense;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    public function SignInRequest(Request $request){
        $data=json_decode($request->getContent());
        $email=$data->email;
        $password=$data->password;
        $result=Driver::where("email",$email)->first();
        if($result){
            if(Hash::check($password,$result->password)){
                return $result;
            }
            return response()->json();
        }
        return response()->json();
    }

    public function addExpense(Request $request){
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
    public function getTotalExpensesForOneDriver(Request $request){
        $data=json_decode($request->getContent());
        $totalExpenses=Expense::where("driver_id",$data->driver_id)->where("status",Expense::VALID)->sum("amount");
        if(!$totalExpenses){
            $totalExpenses=["amount"=>0];
        }
        return response()->json($totalExpenses);
    }

    public function getCurrentMission($id){
        $mission=Mission::where("driver_id",$id)->where("status","0")->first();
        if($mission){
            return $mission;
        }
        return [];
    }

    public function finishDestination($id,Request $request){
        $data=json_decode($request->getContent(),true);
        $oldData=Mission::where("id",$id)->select("direction")->first();
        $oldDataArray=json_decode($oldData,true);
        $newArray=array_push($oldDataArray,$data);
        Mission::where("id",$id)->update(["direction"=>$newArray]);
    }

    public function finishTrip($id,Request $request){
        $data=json_decode($request->getContent(),true);
        $oldData=Mission::where("id",$id)->select("direction")->first();

        $newArray=array_push($oldData->direction,$data);
        Mission::where("id",$id)->update(["direction"=>$newArray]);
    }
}
