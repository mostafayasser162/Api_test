@extends('layout.index')

@section('linkcss')
@endsection

@section('content')
    {{--  dh fel lay out --}}
    <h1 class="text-center">edit {{ $employee->id }}</h1>

    <div class="container col md-6">
        <form action="{{ route('employee.update', $employee->id) }}" method="post">
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
                        <label for="">username</label>
                        <input name="name" type="text" value="{{ $employee->name }}"
                            class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">salary</label>
                        <input name="salary" type="number" value="{{ $employee->salary }}"
                            class="form-control @error('salary') is-invalid @enderror">

                        @error('salary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">


                        <label for="">Department</label>
                        <select name="department" type="text"class="form-control
                            @error('department') is-invalid @enderror">

                            {{-- <option disabled selected>Select the department</option> --}}
                            @foreach ($departments as $item)
                                @if ($item->id == $employee->department_id)
                                    <option selected value="{{ $item->id }}"
                                        {{ old('department') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}"
                                        {{ old('department') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('department')
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
