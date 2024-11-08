@extends('layout.index')



@section('content')
    <div class="container col-md-7">


    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <div>
                    <h1 class="text-center">heres is the employees</h1>
                    <a class="btn btn-info float-end" href="{{ route('employee.create') }}"> create new</a>
                </div>
                @if (Session::has('done'))
                    <div class="alert alert-success">
                        {{ Session::get('done') }}
                    </div>
                @endif
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th>name</th>
                    <th>salary</th>
                    <th>departments</th>
                    <th colspan="3">action</th>

                </tr>

                @foreach ($employees as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->name }}</th>
                        <th>{{ $item->salary }}</th>
                        <th>{{ $item->Department->name }}</th>
                        <th><a class="text-denger" href="{{ route('employee.destroy', $item->id) }}">delete</a></th>
                        <th><a class="text-primary" href="{{ route('employee.show', $item->id) }}">show</a></th>
                        <th><a class="text-warning" href="{{ route('employee.edit', $item->id) }}">edit</a></th>

                    </tr>
                @endforeach
        </div>
    </div>
    </table>
    {{ $employees->links('pagination::simple-bootstrap-4') }}
    </div>
@endsection
