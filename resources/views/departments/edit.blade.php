@extends('layout.index')

@section('linkcss')
@endsection

@section('content')
    {{--  dh fel lay out --}}
    <h1 class="text-center">edit {{ $department->id }}</h1>

    <div class="container col md-6">
        <form action="{{ route('departments.update', $department->id) }}" method="post">
            @csrf
            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">department name</label>
                        <input name="name" type="text" value="{{ $department->name }}"
                            class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">title</label>
                        <input name="title" type="text" value="{{ $department->title }}"
                            class="form-control @error('title') is-invalid @enderror">

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button name="submit" type="submit" class="btn btn-warning"> Update Info</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
