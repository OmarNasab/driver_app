<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Expense;
use App\Models\Mission;


class DashboardController extends Controller
{
    public function index()
    {
        $drivers_count = Driver::count();
        $missions_count = Mission::count();
        $total_expense = Expense::sum("amount");

        $current_mission = Mission::where("status", Mission::IN_PROGRESS)->get();
        $unverified_expense = Expense::where("status", Expense::NOT_VERIFIED)->get();
        $available_drivers = Driver::where("status", '0')->get();
        return view("dashboard", ["drivers_count" => $drivers_count, "missions_count" => $missions_count, "available_drivers" => $available_drivers, "current_mission" => $current_mission, "unverified_expense" => $unverified_expense, "total_expense" => $total_expense]);
    }
}
