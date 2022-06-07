<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {

        $in_progress=Expense::where("status",Expense::NOT_VERIFIED)->get();
        $valid=Expense::where("status",Expense::VALID)->get();
        $invalid=Expense::where("status",Expense::INVALID)->get();
        return view("Pages.Expense.index",["in_progress"=>$in_progress,"valid"=>$valid,"invalid"=>$invalid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $expense=Expense::where("id",1)->first();
        return view("./Pages/Expense/show",["expense"=>$expense]);
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

    public function downloadImage($id)
    {
        $expense=Expense::where("id",$id)->first();

        return response()->download(storage_path("app/public/".$expense->attachment));
    }
    public function verify($id,$status){
        Expense::where("id",$id)->update(["status"=>$status]);

        return redirect()->back();
    }
}
