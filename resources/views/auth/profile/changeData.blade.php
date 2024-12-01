<div class="card">
    <h1 class="text-info text-center"> Change Data </h1>

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
        {{-- @if (Session::has('data'))
            <div class="message_section">
                <div class="success-message">
                    {{ Session::get('data') }}
                </div>
            </div>
        @endif --}}
        @if (Session::has('data'))
            <div class="alert alert-success">
                ✅ {{ Session::get('data') }}
            </div>
        @endif
        <form method="POST" action="{{ route('profile.changeData') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for=""> Name </label>
                <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control"
                    @error('name') is-invalid @enderror>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
            </div>
            <div class="form-group">
                <label for=""> Email</label>
                <input type="email" value="{{ Auth::user()->email }}" name="email" class="form-control"
                    @error('email') is-invalid @enderror>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
            </div>
            <button type="submit" class="btn btn-warning"> Update </button>
        </form>
    </div>
</div>
