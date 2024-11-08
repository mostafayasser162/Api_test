@extends('layout.index')



@section('content')
    <div class="container col-md-7">


    </div>
    <div class="card">
        <div class="card-body">
            <div>
                <h1 class="text-center">list {{ $employee->id }}</h1>
                <a class="btn btn-info float-end" href="{{ route('employee.index') }}"> back</a>
            </div>
            <div>
                <h6>{{ $employee->name }}</h6>
                <hr>
                <h6>{{ $employee->salary }}</h6>
                <hr>
                <h6>{{ $employee->Department->name }}</h6>
                <hr>

            </div>
        </div>
    </div>
    </div>
@endsection
