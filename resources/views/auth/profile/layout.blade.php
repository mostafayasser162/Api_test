@extends('layout.index')



@section('content')
    <div class="container col-md-6">



        @include('auth.profile.changeImage')
        @include('auth.profile.changeData')
        @include('auth.profile.changepassword')

        <div class="card">
            <div class="card-body">
                @if (Session::has('del'))
                    <div class="alert alert-success">
                        ✅ {{ Session::get('del') }}
                    </div>
                @endif
                <form action="{{ route('profile.deleteAccount') }}" method="POST">
                    @csrf
                    <input placeholder="Enter Your Password" type="password" name="curren_password" class="form-control"
                        @error('curren_password') is-invalid @enderror>
                    @error('curren_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                    <button class="btn btn-danger">Delete Account </button>
                </form>
            </div>
        </div>
    </div>
@endsection
