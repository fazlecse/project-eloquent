@extends('layout')

@section('title')
    User details
@endsection

@section('content')
    <table class="table table-stripe table-borderd">
        <tr>
            <th width="80px">Name :</th>
            <td>{{ $students->name }}</td>
        </tr>
        <tr>
            <th>Email :</th>
            <td>{{ $students->email }}</td>
        </tr>
        <tr>
            <th>Age :</th>
            <td>{{ $students->age }}</td>
        </tr>
        <tr>
            <th>City :</th>
            <td>{{ $students->city }}</td>
        </tr>
    </table>
    <a href="{{route('student.index')}}" class="btn btn-danger btn-sm">Back</a>
@endsection
