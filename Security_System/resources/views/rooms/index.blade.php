{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Rooms')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-users"></i> Rooms that are available to you
        </h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Floor</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($rooms as $room)
                    <tr>

                        <td>{{ $room->name }}</td>
                        <td>{{ $room->floor }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection