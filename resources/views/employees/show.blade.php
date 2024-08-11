@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $employee->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Training Name</th>
            <th>Instructor Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employee->trainings as $training)
            <tr>
                <td>{{ $training->training_name }}</td>
                <td>{{ $training->instructor_name }}</td>
                <td>
                    <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <a class="btn btn-success" href="{{ route('trainings.create', $employee->id) }}">Add Training</a>
@endsection
