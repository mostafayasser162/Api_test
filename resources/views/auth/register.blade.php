@extends('layout.index')

@section('linkcss')
@endsection

@section('content')

    <h1 class="text-center">Add user page</h1>
    <div class="container col md-6">
        <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
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
        @if (Session::has('done'))
        <div class="alert alert-success">
            {{ Session::get('done') }}
        </div>
    @endif
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">username</label>
                        <input name="name" type="text" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Email </label>
                        <input name="email" type="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password </label>
                        <input name="password" type="password" value="{{ old('password') }}"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">confirm password</label>
                        <input name="password_confirmation" type="password" value="{{ old('password_confirmation') }}"
                            class="form-control @error('password_confirmation') is-invalid @enderror">

                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Image </label>
                        <input name="image" type="file" accept="image/*" value="{{ old('image') }}"
                            class="form-control @error('image') is-invalid @enderror">

                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button name="submit" type="submit" class="btn btn-info"> Register </button>
                    </div>
                    {{-- <a href="{{route('login')}}">Already have an account</a> --}}

                </div>
            </div>
        </form>
    </div>


    @endsection

