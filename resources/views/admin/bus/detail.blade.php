@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bus</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="@if (!isset($bus)){{ url('/bus/store') }}@else {{ url('/bus/update/'.$bus->id) }} @endif">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ isset($bus) ? $bus->name : '' }}" required autofocus>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Desciption</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description">{{ isset($bus) ? $bus->description : '' }}</textarea>

                                @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (isset($bus))
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bus Schedule</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Bus Stop</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    @foreach ($bus->schedules as $schedules)
                    <tbody>
                        <tr>
                            <td>{{$schedules->busStop->name}}</a></td>
                            <td>{{$schedules->day}}</td>
                            <td>{{$schedules->time}}</td>
                            <td>{{$schedules->description}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Create New Bus Schedule</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/bus-schedule/store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="bus_id" value="{{$bus->id}}" />
                        <div class="form-group">
                            <label for="bus_stop_id" class="col-md-4 control-label">Bus Stop</label>
                            <div class="col-md-6">
                                <select class="form-control" id="bus_stop_id" name="bus_stop_id">
                                    @foreach ($busStops as $busStop)
                                        <option value="{{$busStop->id}}">{{$busStop->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="day" class="col-md-4 control-label">Day</label>
                            <div class="col-md-6">
                                <select class="form-control" id="day" name="day">
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time" class="col-md-4 control-label">Time</label>
                            <div class="col-md-6">
                                <select class="form-control" id="time" name="time">
                                    @for ($i = 0; $i < 24; $i++)
                                    <option value="{{ $i < 10 ? '0'.$i.':00' : $i.':00' }}">{{ $i < 10 ? '0'.$i.':00' : $i.':00' }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Desciption</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description"></textarea>

                                @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
