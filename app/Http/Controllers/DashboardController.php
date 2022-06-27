<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Expense;
use App\Models\Mission;
use App\Models\Vehicle;


class DashboardController extends Controller
{
    public function index()
    {
        $missions_count = Mission::count();
        $total_expense = Expense::sum("amount");

        $current_mission = Mission::where("status", Mission::IN_PROGRESS)->get();
        $unverified_expense = Expense::where("status", Expense::NOT_VERIFIED)->get();

        $drivers=Driver::all();
        $vehicles=Vehicle::all();

        return view("dashboard", ["missions_count" => $missions_count, "drivers" => $drivers,"vehicles"=>$vehicles, "current_mission" => $current_mission, "unverified_expense" => $unverified_expense, "total_expense" => $total_expense]);
    }
}
