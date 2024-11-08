@extends('layout.index')



@section('content')
    <div class="container col-md-7">


    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <div>
                    <h1 class="text-center">heres is the departments</h1>
                    <a class="btn btn-info float-end" href="{{ route('departments.create') }}"> create new</a>
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
                    <th>title</th>
                    <th colspan="3">action</th>

                </tr>

                @foreach ($departments as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->name }}</th>
                        <th>{{ $item->title }}</th>
                        <th><a class="text-primary" href="{{ route('departments.show', $item->id) }}">show</a></th>
                        <th><a class="text-warning" href="{{ route('departments.edit', $item->id) }}">edit</a></th>
                        <th><a class="text-denger" href="{{ route('departments.destroy', $item->id) }}">delete</a></th>

                    </tr>
                @endforeach
        </div>
    </div>
    </table>
    {{-- {{ $departments->links('pagination::simple-bootstrap-4') }} --}}
    </div>
@endsection
