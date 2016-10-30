<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusStop;
use App\Models\BusStopSchedule;
use DB;
use Gate;

class BusSearchController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('bus-search'))
            return redirect('/bus');

        //user location
        $latitude = 1.299430;
        $longitude = 103.855669;

        // $busStops = BusStop::with('buStopSchedule')
        //             ->select('name', 'description', DB::raw('(6371 * acos(cos(radians(latitude)) * cos( radians('.$latitude.')) * cos( radians('.$longitude.') - radians(longitude)) + sin(radians(latitude)) * sin( radians('.$latitude.')))) AS distanceFromUser'))
        //             ->whereHas('buStopSchedule', function($query) {
        //                 $query->where('day', '=', date('l'));
        //             })
        //             ->orderBy('distanceFromUser', 'asc')
        //             ->get();
        //             //echo '<pre>';print_r($busStops);exit;
        // foreach ($busStops as $key => $value) {
        //     echo '<br />'.$value->id;
        // }
        // die();
        // $busStops = DB::table('bus_stop')
        //     ->leftJoin('bus_stop_schedule', 'bus_stop_schedule.bus_stop_id', '=', 'bus_stop.id')
        //     ->join ('bus', 'bus.id', '=', 'bus_stop_schedule.bus_id')
        //     ->select('bus_stop.name',
        //         'bus_stop.description',
        //         'bus_stop_schedule.day',
        //         'bus_stop_schedule.time',
        //         'bus_stop_schedule.description',
        //         'bus.name', 'bus.description',
        //         DB::raw('(6371 * acos(cos(radians(latitude)) * cos( radians('.$latitude.')) * cos( radians('.$longitude.') - radians(longitude)) + sin(radians(latitude)) * sin( radians('.$latitude.')))) AS distanceFromUser')
        //         )
        //     ->orderBy('distanceFromUser', 'asc')
        //     ->orderBy('bus_stop_schedule.time', 'asc')
        //     ->get();
        $busStops = BusStop::select('id', 'name', 'description', DB::raw('(6371 * acos(cos(radians(latitude)) * cos( radians('.$latitude.')) * cos( radians('.$longitude.') - radians(longitude)) + sin(radians(latitude)) * sin( radians('.$latitude.')))) AS distanceFromUser'))
                    ->orderBy('distanceFromUser', 'asc')
                    ->get();

        $schedules = [];
        foreach ($busStops as $busStop) {
            $bstop = [
                'id' => $busStop->id,
                'name' => $busStop->name,
                'description' => $busStop->description,
                'distanceFromUser' => $busStop->distanceFromUser
            ];

            $busStopScheds = DB::table('bus_stop_schedule')
                ->leftJoin('bus', 'bus.id', '=', 'bus_stop_schedule.bus_id')
                ->select(
                        'bus_stop_schedule.day',
                        'bus_stop_schedule.time',
                        'bus_stop_schedule.description as sched_desc',
                        'bus.name',
                        'bus.description as bus_desc'
                        )
                ->where('bus_stop_id', $busStop->id)
                ->orderByRaw(DB::raw("FIELD(bus_stop_schedule.day, 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY'), `bus_stop_schedule`.`time` asc"))
                ->get();

            $buses = [];
            foreach ($busStopScheds as $busStopSched) {
                $buses[] = [
                    'day' => $busStopSched->day,
                    'time' => $busStopSched->time,
                    'name' => $busStopSched->name,
                    'bus_desc' => $busStopSched->bus_desc,
                    'sched_desc' => $busStopSched->sched_desc
                ];
            }

            $bstop['buses'] = $buses;
            $schedules[] = $bstop;
        }

        return view('bus.search', ['schedules' => $schedules]);
    }
}
