@extends('layout.index')

@section('linkcss')
@endsection

@section('content')
    {{--  dh fel lay out --}}
    <h1 class="text-center">hello in create department</h1>

    <div class="container col md-6">
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf {{-- dy msg ana ba3mlha 3shan awsal to larvel    --}}
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
                        <label for="">department</label>
                        <input name="name" type="text" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">title</label>
                        <input name="title" type="text" value="{{ old('title') }}"
                            class="form-control @error('title') is-invalid @enderror">

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button name="submit" type="submit" class="btn btn-info"> submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
