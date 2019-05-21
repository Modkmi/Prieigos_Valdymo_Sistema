@extends('layouts.app')

@section('title', '| Edit Room')

@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-user-plus'></i> Edit {{$room->name}}</h1>
        <hr>
        {{-- @include ('errors.list') --}}

        {{ Form::model($room, array('route' => array('adminrooms.update', $room->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('floor', 'Floor') }}
            {{ Form::text('floor', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            <select class="form-control">
                @foreach($allUsers as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="table-responsive">
            <Caption>
                Users that can enter this room
            </Caption>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection