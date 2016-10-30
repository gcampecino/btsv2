@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @foreach ($schedules as $schedule)
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div>
                        <label>Name : {{$schedule['name']}}</label>
                    </div>
                    <div>
                        <label>Description : {{$schedule['description']}}</label>
                    </div>
                    <div>
                        <label>Distance : {{round($schedule['distanceFromUser'], 3)}} km.</label>
                    </div>
                </div>
                <div class="col-md-12 text-center ">
                    Bus List
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Description</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedule['buses'] as $bus)
                        <tr>
                            <td>{{$bus['name']}}</td>
                            <td>{{$bus['day']}}</td>
                            <td>{{$bus['time']}}</td>
                            <td>{{$bus['bus_desc']}}</td>
                            <td>{{$bus['sched_desc']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
        <!-- <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bus Stops</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Distance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>asdfasdf</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bus Stops</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Distance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>asdfasdf</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
    </div>
</div>
@endsection
