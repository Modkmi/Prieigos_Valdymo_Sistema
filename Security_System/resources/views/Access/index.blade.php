{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Access List')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-users"></i> Access List
        </h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Time Entered</th>
                    <th>Time Exited</th>
                    <th>RFID Presented</th>
                    <td>Access Granted</td>
                </tr>
                </thead>

                <tbody>
                @foreach ($access_list as $access)
                    <tr>
                        <td>{{ $access->time_entered }}</td>
                        <td>{{ $access->time_exited }}</td>
                        <td>{{ $access->rfid_presented }}</td>

                        @if ($access->access_granted == 1)
                            <td width="20px"style="background-color: green"></td>
                        @else
                            <td width="20px" style="background-color: red"></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection