<div class="card">
    <h1 class="text-info text-center"> Change Password </h1>
    <div class="card-body">

        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

        @if (Session::has('passwordd'))
            <div class="message_section">
                <div class="success-message">
                    ✅ {{ Session::get('passwordd') }}
                </div>
            </div>
        @endif
        <form method="POST" action="{{ route('profile.changePassword') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for=""> Current Password</label>
                <input type="password" value="{{ old('current_password') }}" name="current_password" class="form-control"
                    @error('current_password') is-invalid @enderror>
                @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
            </div>
            <div class="form-group">
                <label for=""> New Password</label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control" @error('password') is-invalid @enderror>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Confirm Your Password</label>
                <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control"
                    @error('password_confirmation') is-invalid @enderror>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning"> Update </button>


        </form>
    </div>
</div>
