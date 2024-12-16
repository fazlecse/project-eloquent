@extends('layout')

@section('title')
    All Users Data
@endsection

@section('content')
    <a href="{{ route('student.create') }}" class="btn btn-success btn-sm mb-3 mt-3">Add New</a>
    <table class="table table-striped table-borderd">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>City</th>
            <th>View</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->city }}</td>
                <td><a href="{{ route('student.show', $student->id) }}" class="btn btn-primary btn-sm">View</a></td>
                <td>
                    <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>

                </td>
                <td><a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">Update</a></td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $students->links() }}
    </div>
@endsection
