<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\BusStop;
use App\Http\Controllers\Controller;
use Gate;
use Auth;

class BusController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('bus'))
            return redirect('/bus-search');

        $buses = Bus::all();

        return view('admin.bus.index', ['buses' => $buses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('/bus/create'))
            return redirect('/bus-search');

        return view('admin.bus.detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('/bus/store'))
            return redirect('/bus-search');

        $this->validate($request, [
                'name' => 'required'
            ]);

        $bus = new Bus;
        $bus->name = $request->name;
        $bus->description = $request->description;
        $bus->save();

         return redirect('/bus/show/'.$bus->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Gate::denies('/bus/show/{id}'))
            return redirect('/bus-search');

        $bus = Bus::find($id);
        $busStops = BusStop::all();

        return view('admin.bus.detail', ['bus' => $bus, 'busStops' => $busStops]);
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
        if(Gate::denies('/bus/update/{id}'))
            return redirect('/bus-search');

        $this->validate($request, [
                'name' => 'required'
            ]);

        $bus = Bus::find($id);
        $bus->name = $request->name;
        $bus->description = $request->description;
        $bus->save();

         return redirect('/bus/show/'.$bus->id);
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
