@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    @foreach ($buses as $bus)
                    <tbody>
                        <tr>
                            <td><a href="/bus/show/{{$bus->id}}">{{$bus->name}}</a></td>
                            <td>{{$bus->description}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <a href="{{ url('/bus/create') }}"><button type="submit" class="btn btn-primary">Add</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
