<div class="card">
    {{-- @if ($errors->any('image'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
@if (Session::has('image'))
<div class="alert alert-success">
    ✅ {{ Session::get('image') }}
</div>
@endif
    <h1 class="text-info text-center"> Change Image </h1>

    <div class="card-body">

        <img class="w-25 img-fluid" src="{{ asset('upload') . '/' . Auth::user()->image }}" alt="">

        <form method="POST" action="{{ route('profile.changeImage') }}" enctype="multipart/form-data">

            @csrf
            <input type="file" name="image" class="btn btn-info form-control " accept="image/*"  @error('image') is-invalid @enderror>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
<br>
            <button type="submit" class="btn btn-warning"> Update </button>

        </form>
    </div>
</div>
