@extends('layout.index')



@section('content')
    <div class="container col-md-7">


    </div>
    <div class="card">
        <div class="card-body">
            <div>
                <h1 class="text-center">list {{ $department->id }}</h1>
                <a class="btn btn-info float-end" href="{{ route('departments.index') }}"> back</a>
            </div>
            <div>
                <h6>{{ $department->name }}</h6>
                <hr>
                <h6>{{ $department->title }}</h6>
                <hr>
                @if ($department->created_at == true)
                    <h6>{{ $department->created_at }}</h6>
                @else
                    <h6>no date recorded </h6>
                @endif
                <hr>
            </div>
        </div>
    </div>
    </div>
@endsection
