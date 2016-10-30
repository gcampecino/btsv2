<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BusStopSchedule;
use App\Http\Controllers\Controller;
use Gate;

class BusScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        if(Gate::denies('/bus-schedule/store'))
            return redirect('/bus-search');

        $busStopSchedule = new BusStopSchedule;
        $busStopSchedule->bus_id = $request->bus_id;
        $busStopSchedule->bus_stop_id = $request->bus_stop_id;
        $busStopSchedule->day = $request->day;
        $busStopSchedule->time = $request->time;
        $busStopSchedule->description = $request->description;
        $busStopSchedule->save();

        return redirect('/bus/show/'.$busStopSchedule->bus_id);
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
